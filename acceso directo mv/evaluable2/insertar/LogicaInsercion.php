<?php
include '../coneccion/coneccion.php';
if(isset($_POST["nombreAsig"]) && $_POST["nombreAsig"] != ""){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO asignaturas (nombre) VALUES ('".$_POST["nombreAsig"]."')";
        $conn -> exec($sql);
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = $e -> getMessage();
    }
}

if((isset($_POST["nombreAlu"])) && ($_POST["nombreAlu"] != "") && (isset($_POST["apellido"])) && ($_POST["apellido"]!= "")){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO alumnos (Nombre, Apellidos) VALUES ('".$_POST["nombreAlu"]."', '".$_POST["apellido"]."')";
        $conn -> exec($sql);
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = $e -> getMessage();
    }
}