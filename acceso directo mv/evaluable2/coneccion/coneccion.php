<?php
$servidor = "localhost";
$usuario = "root";
$contra = "";
try{
    $conn = new PDO("mysql:host=$servidor;dbname=calificaciones", $usuario, $contra);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    $_SESSION["errores"]["db"] = "Conexion fallida: " .$e->getMessage();
}