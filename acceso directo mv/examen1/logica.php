<?php

function factorial($num){
    $texto = "";
    $aux = 0;
    for($i = 1; $i <= $num; $i = $i + 2){
        if($aux == 0){
            $aux = $i;
        }else{
            $aux = $i - 1;
        }
        if(!isset($resultado)){
            $resultado = $aux * $i;
            $texto =  $aux. "";
        }else{
            $resultado = $resultado * $aux * $i;
            $texto = "" .$texto. "x" .$aux. "x" .$i;
        }
    }
    echo "<p>".$num. "!  " .$texto. "=" .$resultado."</p>";
}

// function separar($url){
//     $aux1 = [];
//     $aux2 = [];
//     $comprobante = true;
//     if(preg_match($url, ".",$aux1)){
//         var_dump($aux1);
//     }else{
//         $comprobante = false;
//     }
// }

function costeEnvio($precio){
    if($precio >= 200){
        echo "<p>El envio le sale gratis</p>";
    }else if(($precio < 200) && ($precio > 100)){
        $descuento = $precio * 0.05;
        $envio = 30 - $descuento;
        echo "<p>El envio le sale: ".$envio."€</p>";
    }else{
        echo "<p>El envio le sale 30€</p>";
    }
}

function lecturaFichero(){
    $dato = file_get_contents("texto.json");
    $datos = json_decode($dato);
    echo "<p>El texto es: ".$datos[0]."</p>";
    echo "<p>Fue escrito en: ".$datos[1]."</p>";
    echo "<p>A la hora: ".$datos[2]."</p>";
}

function insertarFichero($texto){
    $fecha = date("Y-m-d");
    $tiempo = time();
    $hora = date("H:i:s");
    $datos = [$texto,  $fecha, $hora, $tiempo];
    $dato = json_encode($datos);
    if(file_put_contents("texto.json", $dato)){
        lecturaFichero();
    }else{

    }

}

function desencriptar($encriptado){
    $texto = openssl_decrypt($encriptado, "aes-256-gcm", CONTRA);
    echo "<p>El texto desencriptado es: ".$texto."</p>";
}

function encriptar($texto){
    define("CONTRA","asir1234");
    $encriptado = openssl_encrypt($texto,"aes-256-gcm", CONTRA);
    echo "<p>El texto encriptado es: ".base64_encode($encriptado)."</p>";
    desencriptar($encriptado);
}

if($_POST["numero"] != ""){
    factorial($_POST["numero"]);
}

// if($_POST["enlace"] != ""){
//     separar($_POST["enlace"]);
// }

if($_POST["precio"] != "" || $_POST["precio"] > 0){
    costeEnvio($_POST["precio"]);
}

if($_POST["textoJ"] != ""){
    insertarFichero($_POST["textoJ"]);
}

if($_POST["textoE"] != ""){
    encriptar($_POST["textoE"]);
}