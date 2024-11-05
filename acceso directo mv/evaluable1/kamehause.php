<?php
session_start();

$nombreGalleta = "sesion";
$datos = file_get_contents("documentos/".$_SESSION['dato']['correoRec']. ".json");
//seteamos las coockies
if($_POST["galleta"]){
    setcookie($nombreGalleta, $datos);
    if(isset($_COOKIE[$nombreGalleta])){
        $_SESSION["info"] = "Se ha introducido correctamente";
        
    }else{
        $_SESSION["error"]["galleta"] =  "No se ha podido introducir";
    }
    header("Location: login.php");
    die();
}