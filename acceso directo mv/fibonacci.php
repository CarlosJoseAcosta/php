<?php

echo "Ingresa la cantidad de suma que quieres tener en tu sucecion de fibonacci: ";
fscanf(STDIN, "%s", $contador);
$num1 = 0;
$num2 = 1;
for ($i = 0; $i < $contador; $i++){
    $num3 = $num1 + $num2;
    if($i == 0){
        echo $num1 . " " . $num2 . " " .$num3 . " ";
    }else{
        echo $num3 . " ";
    }
 
    $num1 = $num2;
    $num2 = $num3;
}