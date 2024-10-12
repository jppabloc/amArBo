<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "amarbo";
$conexion;
$port = "3307";

try {
    $conexion = new PDO(
        "mysql:host=$server;port=$port;dbname=$database;",
        $username,
        $password
    );
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>console.log('conexion exitosa.')</script>";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
    echo "<script>console.log('conexion fallida')</script>";
}
