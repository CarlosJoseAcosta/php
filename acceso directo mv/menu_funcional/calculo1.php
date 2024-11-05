<?php
session_start();

function capitalTotal($inv, $inte, $ani)
{
    $resultado = $inv * $inte * $ani;
    $_SESSION["capital"] = $resultado;
    //echo $inv. "x" .$inte. "x" .$ani.
    header("Location: menu.php");
    die();
}
function saldoBeneficio($inv, $inte, $an)
{
    for ($x = 1; $x <= $an; $x++) {
        if (isset($auxiliar)) {
            $saldo = $auxiliar * $inte * $x;
            $BeneficiosPorAnios[] = "El saldo por el año " . $x . " es => " . $saldo;
            $auxiliar = $saldo;
        } else {
            $saldo = $inv * $inte * $x;
            $BeneficiosPorAnios[] = "El saldo por el año " . $x . " es => " . $saldo;
            $auxiliar = $saldo;
        }
    }
    $strBeneficios = implode("<br>", $BeneficiosPorAnios);
    $_SESSION["beneficios"] = $strBeneficios;
    var_dump($_SESSION["beneficios"]);
    header("Location: menu.php");
    die();
}

function beneficioPan($pan){
    if($pan > 0){
        $sinDesceunto = $pan * 3.49;
        $conDescuento = $sinDesceunto * 0.6;
        $_SESSION["precioOrig"] = $sinDesceunto;
        $_SESSION["precio"] = $conDescuento;
        echo $_SESSION["precioOrig"];
        header("Location: menu.php");
        die();
    }
}

function telefono($telefono){
    $separaciones = [];
    if(preg_match('/^([+][0-9]{2,3})([0-9]{9})([-][0-9]{2})$/', $telefono, $separaciones)){
        $numero = $separaciones[2];
        $_SESSION["telefono"] = $numero;
        header("Location: menu.php");
        die();
    }
}

function nacimiento($nacimiento){
    $separaciones = [];
    if(preg_match('/^([0-9]{4})(-)([0-9]{2})(-)([0-9]{2})$/', $nacimiento, $separaciones)){
        $anio = $separaciones[1];
        //echo date("Y");
        $edad = date("Y") - $anio;
        if($edad > 18){
            $_SESSION["mayorEdad"] = "Es mayor de edad";
        }else{
            $_SESSION["mayorEdad"] = "No es mayor de edad";
        }
    }
    header("Location: menu.php");
    die();
}

function contra($contra, $contra2){
    $auxiliar = [];
    if($contra == $contra2){
        if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{10,155}$/', $contra, $auxiliar)){
            $_SESSION["contra"] = "La contraseña cumple con los requisitos";
        }else{
            $_SESSION["contra"] = "La contraseña NO cumple con los requisitos";
        }
    }else{
        $_SESSION["contra"] = "Las contraseñas no son iguales";
    }
    header("Location: menu.php");
    die();
}

if (isset($_POST["inversion"])) {
    $inversion = $_POST["inversion"];
    $inversion = (float) $inversion;
} else {
    $inversion = "";
}
if (isset($_POST["anio"])) {
    $anio = $_POST["anio"];
    $anio = (float) $anio;
} else {
    $anio = 0;
}
if (isset($_POST["interes"])) {
    $interes = $_POST["interes"];
    $interes = (float) $interes;
} else {
    $interes = "";
}
if (($inversion != "") && ($anio != 0) && ($inversion != "")) {

    capitalTotal($inversion, $interes, $anio);
}

if (isset($_POST["inversion2"])) {
    $inversion2 = $_POST["inversion2"];
    $inversion2 = (float) $inversion2;
} else {
    $inversion2 = "";
    echo "a";
}
if (isset($_POST["interes2"])) {
    $interesa2 = $_POST["interes2"];
    $interesa2 = (float) $interesa2;
} else {
    $interesa2 = "";
}
if (isset($_POST["anio2"])) {
    $anio2 = $_POST["anio2"];
} else {
    $anio = 0;
}

if (($inversion2 != "") && ($interesa2 != "") && ($anio2 != 0)) {

    saldoBeneficio($inversion2, $interesa2, $anio2);
}

if(isset($_POST["pan"])){
    $panVendido = $_POST["pan"];
    beneficioPan($panVendido);
}else{
    $panVendido = 0;
}

if(isset($_POST["telefono"])){
    $telefono = $_POST["telefono"];
    telefono($telefono);
}

if(isset($_POST["fechaNac"])){
    $nacimiento = $_POST["fechaNac"];
    nacimiento($nacimiento);
}

if((isset($_POST["contra"])) && (isset($_POST["contra2"]))){
    $contra = $_POST["contra"];
    $contra2 = $_POST["contra2"];
    contra($contra, $contra2);
}