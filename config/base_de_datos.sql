
-- Crear base de datos
CREATE DATABASE IF NOT EXISTS personas
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Crear usuario
CREATE USER IF NOT EXISTS 'personas'@'%'
IDENTIFIED BY 'personas';

-- Conceder permisos
GRANT ALL PRIVILEGES ON personas.* TO 'personas'@'%';


-- Seleccionar base de datos
USE personas;

-- Crear tabla persona
CREATE TABLE IF NOT EXISTS persona (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);