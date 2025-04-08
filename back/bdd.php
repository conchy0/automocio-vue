<?php
class Database {
    private $host = "127.0.0.1";
    private $db_name = "automocio";
    private $username = "root";
    private $password = "";
    public $conn;

    /**
     * Obtenir la connexió a la base de dades
     *
     * @return PDO|null
     */
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo json_encode(["error" => "Error de connexió: " . $exception->getMessage()], JSON_UNESCAPED_UNICODE);
        }
        return $this->conn;
    }
}

/**
 * Classe User
 */
class User {
    private $conn;
    private $table_name = "usuaris";

    /**
     * Constructor
     *
     * @param PDO $db Connexió a la base de dades
     */
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Crear un nou usuari
     *
     * @param array $dades Dades de l'usuari
     * @return bool
     */
    public function crear($dades) {
        $query = "INSERT INTO " . $this->table_name . " (nom_usuari, correu, contrasenya_hash, politica_privacitat_acceptada, rol) 
                  VALUES (:nom_usuari, :correu, :contrasenya_hash, :politica_privacitat_acceptada, :rol)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nom_usuari', $dades['nom_usuari']);
        $stmt->bindParam(':correu', $dades['correu']);
        $stmt->bindParam(':contrasenya_hash', $dades['contrasenya_hash']);
        $stmt->bindParam(':politica_privacitat_acceptada', $dades['politica_privacitat_acceptada'], PDO::PARAM_BOOL);
        $stmt->bindParam(':rol', $dades['rol']);

        return $stmt->execute();
    }

    /**
     * Obtenir tots els usuaris
     *
     * @return array
     */
    public function obtenirTots() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtenir un usuari per ID
     *
     * @param int $id ID de l'usuari
     * @return array|null
     */
    public function obtenirPerId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        /**
     * Obtenir un usuari per correu
     *
     * @param string $correu Correu de l'usuari
     * @return array|null
     */
    public function obtenirPerCorreu($correu) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE correu = :correu";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correu', $correu, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Actualitzar un usuari
     *
     * @param int $id ID de l'usuari
     * @param array $dades Dades a actualitzar
     * @return bool
     */
    public function actualitzar($id, $dades) {
        $query = "UPDATE " . $this->table_name . " 
                  SET nom_usuari = :nom_usuari, correu = :correu, contrasenya_hash = :contrasenya_hash, 
                      politica_privacitat_acceptada = :politica_privacitat_acceptada, rol = :rol
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nom_usuari', $dades['nom_usuari']);
        $stmt->bindParam(':correu', $dades['correu']);
        $stmt->bindParam(':contrasenya_hash', $dades['contrasenya_hash']);
        $stmt->bindParam(':politica_privacitat_acceptada', $dades['politica_privacitat_acceptada'], PDO::PARAM_BOOL);
        $stmt->bindParam(':rol', $dades['rol']);

        return $stmt->execute();
    }

    /**
     * Eliminar un usuari
     *
     * @param int $id ID de l'usuari
     * @return bool
     */
    public function eliminar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

/**
 * Classe TitolsPortada
 */
class TitolsPortada {
    private $conn;
    private $table_name = "titols_portada";

    /**
     * Constructor
     *
     * @param PDO $db Connexió a la base de dades
     */
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Obtenir els títols de portada
     *
     * @return array
     */
    public function obtenirTitols() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Actualitzar els títols de portada
     *
     * @param array $dades Dades dels títols
     * @return bool
     */
    public function actualitzarTitols($dades) {
        $query = "UPDATE " . $this->table_name . " 
                  SET titol_1 = :titol_1, titol_2 = :titol_2, titol_3 = :titol_3, titol_4 = :titol_4 
                  WHERE id = 1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titol_1', $dades['titol_1']);
        $stmt->bindParam(':titol_2', $dades['titol_2']);
        $stmt->bindParam(':titol_3', $dades['titol_3']);
        $stmt->bindParam(':titol_4', $dades['titol_4']);

        return $stmt->execute();
    }
}
?>