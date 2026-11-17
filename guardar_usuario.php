<?php

$host = 'localhost';
$db   = 'personas'; 
$user = 'personas';
$pass = 'personas'; 
$tabla = 'persona';
$charset = 'utf8mb4'; 



// Opciones adicionales para PDO
$opciones = [
    // Lanza una excepción en caso de errores (modo más seguro)
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,

];

try {
    // El objeto $pdo ahora representa la conexión a la base de datos
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass, $opciones);

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO persona (nombre, email, password)
            VALUES (:nombre, :email, :password)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "Usuario dado de alta correctamente.";
    } else {
        echo "Error al dar de alta el usuario.";
    }

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
