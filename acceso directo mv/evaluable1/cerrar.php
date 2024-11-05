<?php
session_start();
//unset($_SESSION["dato"]);
session_destroy();
if(isset($_COOKIE["sesion"])){
    setCookie("sesion", "", 1);
}
header("Location: login.php");
die();