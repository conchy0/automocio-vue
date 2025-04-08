<?php
require_once 'bdd.php';
require_once __DIR__ . '/../vendor/autoload.php';

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;

class Serve {
    private $key = "Automocio_1924x"; 
    private $conn;

    public function __construct() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function serve() {
        
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $paths = explode('/', parse_url($uri, PHP_URL_PATH));
        array_shift($paths);
        array_shift($paths);
        array_shift($paths);
        $resource = array_shift($paths);
        $action = array_shift($paths);


        if ($resource == "auth") {
            if ($method == "POST" && $action == "login") {
                $this->login();
            } elseif ($method == "POST" && $action == "register") {
                $this->register();
            } elseif ($method == "PUT" && $action == "update") {
                $this->updateUser($userData);
            } elseif ($method == "DELETE" && $action == "delete") {
                $this->deleteUser($userData);
            }
            
        }

        if ($resource == "user") {
            $userData = $this->verifyToken();
            if ($userData) {
                if ($method == "GET" && $action == "all") {
                    $this->getAllUsers($userData);
                }   
            }
        }
    }

    private function login() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['correu']) || !isset($data['contrasenya'])) {
            echo json_encode(['error' => 'Falten les dades.']);
            http_response_code(400);
            return;
        }

        $correu = $data['correu'];
        $contrasenya = $data['contrasenya'];

        $user = new User($this->conn);
        $userData = $user->obtenirPerCorreu($correu);

        if ($userData) {
            try {
                if (password_verify($contrasenya, $userData['contrasenya_hash'])) {
                    $token = $this->createToken($userData['id'], $userData['rol']);
                    echo json_encode([
                        'token' => $token,
                        'user' => [
                            'id' => $userData['id'],
                            'nom_usuari' => $userData['nom_usuari'],
                            'correu' => $userData['correu'],
                            'rol' => $userData['rol']
                        ]
                    ]);
                    http_response_code(200);
                } else {
                    throw new Exception('Credencials incorrectes');
                }
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
                http_response_code(401);
            }
        } else {
            echo json_encode(['error' => 'Usuari no trobat']);
            http_response_code(404);
        }
    }

    private function register() {
        $dades = json_decode(file_get_contents("php://input"), true);

        if (!isset($dades['nom_usuari']) || !isset($dades['correu']) || !isset($dades['contrasenya'])) {
            echo json_encode(['error' => 'Falten les dades obligatòries.']);
            http_response_code(400);
            return;
        }

        error_log("Dades rebudes: " . json_encode($dades));

        $dades['contrasenya_hash'] = password_hash($dades['contrasenya'], PASSWORD_BCRYPT);
        unset($dades['contrasenya']);

        if (isset($dades['politica_privacitat_acceptada'])) {
            $dades['politica_privacitat_acceptada'] = (bool)$dades['politica_privacitat_acceptada'];
        } else {
            $dades['politica_privacitat_acceptada'] = false;
        }

        if (isset($dades['rol'])) {
            $dades['rol'] = $dades['rol'];
        } else {
            $dades['rol'] = 'client';
        }

        $user = new User($this->conn);
        $resultat = $user->crear($dades);

        if ($resultat) {
            http_response_code(201);
            echo json_encode(["missatge" => "Usuari registrat correctament."]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "No s'ha pogut registrar l'usuari."]);
        }
    }

    private function getAllUsers($userData) {
        if ($userData['rol'] !== 'administrador') {
            echo json_encode(['error' => 'No tens permisos per accedir a aquesta informació.']);
            http_response_code(403); 
            return;
        }
    
        $user = new User($this->conn);
        $usuaris = $user->obtenirTots();
    
        echo json_encode($usuaris);
        http_response_code(200);
    }

    private function updateUser($userData) {
        if ($userData['rol'] !== 'administrador') {
            echo json_encode(['error' => 'No tens permisos per actualitzar usuaris.']);
            http_response_code(403);
            return;
        }
    
        $dades = json_decode(file_get_contents("php://input"), true);
    
        if (!isset($dades['id']) || !isset($dades['nom_usuari']) || !isset($dades['correu']) || !isset($dades['rol'])) {
            echo json_encode(['error' => 'Falten dades obligatòries.']);
            http_response_code(400);
            return;
        }
    
        $user = new User($this->conn);
        $resultat = $user->actualitzar($dades['id'], $dades);
    
        if ($resultat) {
            echo json_encode(['missatge' => 'Usuari actualitzat correctament.']);
            http_response_code(200);
        } else {
            echo json_encode(['error' => 'No s\'ha pogut actualitzar l\'usuari.']);
            http_response_code(500);
        }
    }
    
    private function deleteUser($userData) {
        if ($userData['rol'] !== 'administrador') {
            echo json_encode(['error' => 'No tens permisos per eliminar usuaris.']);
            http_response_code(403);
            return;
        }
    
        $dades = json_decode(file_get_contents("php://input"), true);
    
        if (!isset($dades['id'])) {
            echo json_encode(['error' => 'Falta l\'ID de l\'usuari.']);
            http_response_code(400);
            return;
        }
    
        $user = new User($this->conn);
        $resultat = $user->eliminar($dades['id']);
    
        if ($resultat) {
            echo json_encode(['missatge' => 'Usuari eliminat correctament.']);
            http_response_code(200);
        } else {
            echo json_encode(['error' => 'No s\'ha pogut eliminar l\'usuari.']);
            http_response_code(500);
        }
    }

    private function createToken($userId, $rol) {
        $payload = [
            'iss' => "http://", 
            'aud' => "http://", 
            'iat' => time(),
            'nbf' => time(), 
            'exp' => time() + (24 * 60 * 60), 
            'data' => [
                'userId' => $userId,
                'rol' => $rol
            ]
        ];

        return JWT::encode($payload, $this->key, 'HS256');
    }

    private function verifyToken() {
        $headers = apache_request_headers();
        if (isset($headers['Authorization'])) {
            $token = str_replace('Bearer ', '', $headers['Authorization']);
            try {
                $decoded = JWT::decode($token, new Key($this->key, 'HS256'));
                return (array) $decoded->data;
            } catch (Exception $e) {
                error_log("Error en verificar el token: " . $e->getMessage());
                echo json_encode(['error' => 'Error en verificar el token: ' . $e->getMessage()]);
                return false;
            }
        }
        echo json_encode(['error' => 'No s\'ha trobat la capçalera d\'autorització']);
        return false;
    }

}

$server = new Serve();
$server->serve(); 
?>