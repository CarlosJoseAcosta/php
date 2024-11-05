<?php
function suma(){
    echo "Elija un numero: ";
    fscanf(STDIN, "%s", $num1);
    echo "Elija otro: ";
    fscanf(STDIN, "%s", $num2);
    $resultado = $num1 + $num2;
    echo $num1. "+" .$num2. "=" .$resultado. "\n";
}

function resta(){
    echo "Elija un numero: ";
    fscanf(STDIN, "%s", $num1);
    echo "Elija otro: ";
    fscanf(STDIN, "%s", $num2);
    $resultado = $num1 - $num2;
    echo $num1. "-" .$num2. "=" .$resultado. "\n";
}

function multi(){
    echo "Elija un numero: ";
    fscanf(STDIN, "%s", $num1);
    echo "Elija otro: ";
    fscanf(STDIN, "%s", $num2);
    $resultado = $num1 * $num2;
    echo $num1. "x" .$num2. "=" .$resultado. "\n";
}

function dividir(){
    echo "Elija un numero: ";
    fscanf(STDIN, "%s", $num1);
    echo "Elija otro: ";
    fscanf(STDIN, "%s", $num2);
    if($num2 > 0 || $num2 < 0){
        $resultado = $num1 / $num2;
    echo $num1. "/" .$num2. "=" .$resultado. "\n";
    }else{
        echo"El divisor tiene que ser un numero diferente a 0 \n";
    }
}

function magia(){
    echo"Escriba un calculo directamente: ";
    fscanf(STDIN, "%s", $calculo);
    $separador = strpbrk($calculo, "+-*x/");
    $cadena1 = explode($separador[0], $calculo);

        if($separador[0] == "+"){
            $operador = 1;
        }elseif($separador[0] == "-"){
            $operador = 2;
        }elseif($separador[0] == "*" || $separador[0] == "x"){
            $operador = 3;
        }elseif($separador[0] == "/"){
            $operador = 4;
        }
    switch($operador){
        case 1:
            $resultado = $cadena1[0] + $cadena1[1];
            break;
        case 2:
        $resultado = $cadena1[0] - $cadena1[1];
        break;
        case 3:
            $resultado = $cadena1[0] * $cadena1[1];
            break;
        case 4:
            if($cadena1[1] != 0){
                $resultado = $cadena1[0] / $cadena1[1];
            }else{
                echo"Elija un divsor que no sea 0\n";
            }
        break;
    }
    echo "El resultado es: " .$resultado. "\n";
}

$comprobante = 1;

do{
    echo "1) Sumar \n";
    echo "2) Restar \n";
    echo "3) Multiplicar \n";
    echo "4) Dividir \n";
    echo "5) La miquierramienta misteriosa \n";
    echo "0) Salir \n";
    echo "Elige una opcion: ";
    fscanf(STDIN, "%s", $elegir);
    switch($elegir){
        case 1:
            suma();
            break;
        case 2:
            resta();
            break;
        case 3:
            multi();
            break;
        case 4:
            dividir();
            break;
        case 5:
            magia();
            break;
        case 0:
            $comprobante++;
            break;
        default:
            echo "Opcion no encontrada";
    }
}while($comprobante == 1);