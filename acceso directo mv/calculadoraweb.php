<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<?php 
$num1 = "";
$num2 = "";
$cehckSum = "";
$cehckRes = "";
$cehckMul = "";
$cehckDiv = "";
$cehckMag = "";
$nombreCookie = "calculos_aneteriores";

if(isset($_POST["num1"])) $num1 = $_POST["num1"];
if(isset($_POST["num2"])) $num2 = $_POST["num2"];
if(isset($_POST["operador"])){
    switch($_POST){
        case 1:
            $cehckSum = "checked";
            break;
        case 2:
            $cehckRes = "checked";
            break;
        case 3:
            $cehckMul = "checked";
            break;
        case 4:
            $cehckDiv = "checked";
            break;
        case 5:
            $cehckMag = "checked";
        break;
    }
}

if(!isset($_COOKIE[$nombreCookie])){
    setcookie($nombreCookie, " ");
}
$matrizOperaciones = [];
        
?>
<body>
    <form action="calculadoraweb.php" method="POST">
        <label>Numero 1</label>
        <input type="number" name="num1" value="<?php echo $num1; ?>"><br>
        <label>Numero 2</label>
        <input type="number" name="num2" value="<?php echo $num2; ?>"><br>
        <label>Numero 3 (opcional)</label>
        <input type = "number" name="num3"><br>
        <label><input type="radio" name="operador" value="1" <?php echo $cehckSum;?>>+<br></label>
        <label><input type="radio" name="operador" value="2" <?php echo $cehckRes;?>>-<br></label>
        <label><input type="radio" name="operador" value="3" <?php echo $cehckMul;?>>x<br></label>
        <label><input type="radio" name="operador" value="4" <?php echo $cehckDiv;?>>/<br></label>
        <label><input type="radio" name="operador" value="5" <?php echo $cehckMag;?>>>magia<br></label>
        <input type="text" name ="magia" placeholder="En caso de magia"><br>
        <input type="submit" name="enviar"><br>
    </form>
    <?php 
        function suma(){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            if($_POST["num3"] != ""){
                $num3 = $_POST['num3'];
                $resultado = $num1 + $num2 + $num3;
                echo "<p>" .$num1. "+" .$num2. "+" .$num3. "=" .$resultado. "</p>";
                return $num1. "+" .$num2. "+" .$num3. "=" .$resultado;
            }else{
                $resultado = $num1 + $num2;
                echo "<p>" .$num1. "+" .$num2. "=" .$resultado. "</p>";
                return $num1. "+" .$num2. "=" .$resultado;
            }
        }
        
        function resta(){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            if($_POST["num3"] != ""){
                $num3 = $_POST['num3'];
                $resultado = $num1 - $num2 - $num3;
                echo "<p>" .$num1. "-" .$num2. "-" .$num3. "=" .$resultado. "</p>";
                return $num1. "-" .$num2. "-" .$num3. "=" .$resultado;
            }else{
                $resultado = $num1 - $num2;
                echo "<p>" .$num1. "-" .$num2. "=" .$resultado. "</p>";
                return $num1. "-" .$num2. "=" .$resultado;
            }
            
        }
        
        function multi(){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            if($_POST["num3"] != ""){
                $num3 = $_POST['num3'];
                $resultado = $num1 * $num2 * $num3;
                echo "<p>" .$num1. "x" .$num2. "x" .$num3. "=" .$resultado. "</p>";
                return $num1. "x" .$num2. "x" .$num3. "=" .$resultado;
            }else{
                $resultado = $num1 * $num2;
                echo "<p>" .$num1. "x" .$num2. "=" .$resultado. "</p>";
                return $num1. "x" .$num2. "=" .$resultado;
            }
        }
        
        function dividir(){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            if($_POST["num3"] != ""){
                $num3 = $_POST['num3'];
                if(($num2 > 0 || $num2 < 0) && ($num3 > 0 || $num3 < 0)){
                    $resultado = $num1 / $num2 / $num3;
                    echo "<p>" .$num1. "/" .$num2. "/" .$num3. "=" .$resultado. "</p>";
                    return $num1. "/" .$num2. "/" .$num3. "=" .$resultado;
            }else{
                    echo'<p style="color" = "red">El divisor tiene que ser un numero diferente a 0</p>';
                }
            }else{
                if($num2 > 0 || $num2 < 0){
                    $resultado = $num1 / $num2;
                echo "<p>" .$num1. "/" .$num2. "=" .$resultado. "</p>";
                return $num1. "/" .$num2. "=" .$resultado;
                }else{
                    echo"<p style='color = `red`'>El divisor tiene que ser un numero diferente a 0</p>";
                }
            }
        }
        function magia(){
            $calculo = "";
            $calculo = $_POST['magia'];
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
                        echo"Elija un divsor que no sea 0";
                    }
                break;
            return $calculo;
                //default:

            }
            echo "El resultado es: " .$resultado. "\n";
        }

        function borradoCookie($nombre){
            if(isset($_COOKIE[$nombre])){
                setcookie($nombre, "", 3600);
            }
        }

        if(isset($_POST["operador"])){
            $elegir = $_POST["operador"];
        }else{
            $elegir = 0;
        }
    switch($elegir){
        case 0:
            break;
        case 1:
            $auxiliar = suma();
            break;
        case 2:
            $auxiliar = resta();
            break;
        case 3:
            $auxiliar = multi();
            break;
        case 4:
            $auxiliar = dividir();
            break;
        case 5:
            $auxiliar = magia();
            break;
        default:
            break;
        }

   
    if(isset($_COOKIE[$nombreCookie])){
        if(isset($auxiliar)){
                if(isset($auxiliar)){
                    if(!isset($matrizOperaciones)){echo $auxiliar;} 
                array_push($matrizOperaciones, $auxiliar);
                $elJson = json_encode($matrizOperaciones);
                setcookie($nombreCookie, $elJson, time() + 3600);
            }
        $matrizOperaciones = json_decode($_COOKIE[$nombreCookie]);
        if(isset($auxiliar) && isset($matrizOperaciones)){
            array_push($matrizOperaciones, $auxiliar);
        $elJson = json_encode($matrizOperaciones);
        foreach($matrizOperaciones as $x){
            echo $x. "<br>";
        }
        setcookie($nombreCookie, $elJson);
        }
    
        
        
    }
}else{
    if(isset($_POST)){
        echo"<p>Las cookies estan desabilitadas, para disfrutar del historial habilitelas.";
    }
}
    
    ?>
    <form action="calculadoraweb.php" method="POST">
        <input type="submit" name="borrarCookies" value = "borrar">
    </form>
    <?php 
        if(isset($_POST['borrarCookies'])){
            borradoCookie($nombreCookie);
        }
    ?>
</body>
</html>