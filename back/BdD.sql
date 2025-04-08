CREATE TABLE usuaris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_usuari VARCHAR(50) NOT NULL UNIQUE,
    correu VARCHAR(100) NOT NULL UNIQUE,
    contrasenya_hash VARCHAR(255) NOT NULL,
    politica_privacitat_acceptada BOOLEAN DEFAULT FALSE,
    rol ENUM('administrador', 'client') DEFAULT 'client',
    inscripcio_completada BOOLEAN DEFAULT FALSE,
    data_creacio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_actualitzacio TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE titols_portada (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titol_1 VARCHAR(100) DEFAULT 'Segona Jornada Automoció',
    titol_2 VARCHAR(100) DEFAULT 'Mobilitat a les nostres comarques',
    titol_3 VARCHAR(100) DEFAULT 'Del 4 al 6 de Febrer del 2026',
    titol_4 VARCHAR(100) DEFAULT 'Departament de transport i manteniment de vehicles',
    data_actualitzacio TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE agenda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_dia ENUM('DIA 1', 'DIA 2', 'DIA 3') NOT NULL,
    nom_dia VARCHAR(20) NOT NULL,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    ruta_foto VARCHAR(255),
    titol VARCHAR(100) NOT NULL,
    descripcio TEXT,
    data_creacio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_actualitzacio TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO agenda (numero_dia, nom_dia, data, hora, titol, descripcio) 
VALUES 
    ('DIA 1', 'Dimarts 4', '2026-02-04', '09:00:00', 'Inauguració', 'Descripció de l''acte d''inauguració'),
    ('DIA 2', 'Dimecres 5', '2026-02-05', '10:00:00', 'Conferències tècniques', 'Descripció de les conferències del dia'),
    ('DIA 3', 'Dijous 6', '2026-02-06', '11:00:00', 'Clausura', 'Descripció de l''acte de clausura');


INSERT INTO usuaris (
    nom_usuari, 
    correu, 
    contrasenya_hash, 
    politica_privacitat_acceptada, 
    rol, 
    inscripcio_completada,
    data_creacio,
    data_actualitzacio
) VALUES (
    'nilpuertomarques', 
    'nilpuertomarques@gmail.com', 
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',  
    1,  
    'administrador', 
    1,  
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP
);