<?php
session_start();
if(unlink('documentos/' .$_SESSION["dato"]["correoRec"].".json")){
    if(isset($_COOKIE["sesion"])){
        setCookie("sesion", "", 1);
    }
    if(unlink('documentos/' .$_SESSION["dato"]["rutaImg"])){}
    $_SESSION["info"] = "La cuenta se ha eliminado con exito";
    unset($_SESSION["errores"]);
    header("Location: registro.php");
    die();
}else{
    $_SESSION["errores"]["eliminar"] = "Ha ocurrido un problema inesperado, no se pudo eliminar la cuenta";
    header("Location: login.php");
    die();
}