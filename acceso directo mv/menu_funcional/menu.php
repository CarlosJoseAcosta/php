<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de funciones</title>
</head>

<body>
    <h2>act1</h2>
    <form action="calculo1.php" method="POST">
        <label>Cantidad que desea invertir
            <input type="text" name="inversion">
        </label>
        <label>El interes anual<input type="text" name="interes"></label>
        <label>Numero de años de la inversion
            <input type="number" name="anio">
        </label>
        <input type="submit" name="enviar">
    </form>
    <?php
    if (isset($_SESSION["capital"])) {
        echo "<p>La capital total es de " . $_SESSION['capital'] .  "</p>";
        session_destroy();
    }
    ?>
    <h2>act2</h2>
    <form action="calculo1.php" method="POST">
        <label>El intéres generado en su cuenta de ahorros<input type="text" name="interes2"></label>
        <label>La capital inicial invertido
            <input type="text" name="inversion2">
        </label>
        <label>Años que desea comprobar<input type = "number" name = "anio2"></label>
        <input type="submit" name="enviar">
    </form>
    <?php
        if(isset($_SESSION["beneficios"])){
            echo "<p>" .$_SESSION["beneficios"]. "</p>";
            session_destroy();
        }
    ?>
    <h2>act3</h2>
    <form action = "calculo1.php" method="POST">
        <label>Cuantos panes de otro dia ha vendido<input type = "number" name = "pan"></label>
        <input type = "submit">
    </form>
    <?php
        if(isset($_SESSION["precioOrig"]) && isset($_SESSION["precio"])){
            echo "<p> El precio original sin descuento es de: " .$_SESSION["precioOrig"]. "</p>";
            echo "<p> El precio original con el descuento es de: " .$_SESSION["precio"]. "</p>";
            session_destroy();
        }
    ?>
    <h2> act 4</h2>
    <form action = "calculo1.php" method = "POST">
        <label>Introduzca su telefono con prefijo numero-sufijo:<input type = "text" name = "telefono"></label>
        <input type = "submit">
    </form>
    <?php
        if(isset($_SESSION["telefono"])){
            echo"<p> El numero sin prefijo ni sufijo es: ".$_SESSION['telefono']." </p>";
            session_destroy();
        }
    ?>
    <h2>Act 5</h2>
    <form action = "calculo1.php" method = "POST">
        <label>Introduzca la fecha de nacimiento<input type = "date" name = "fechaNac"></label>
        <input type = "submit">
    </form>
    <?php
        if(isset($_SESSION["mayorEdad"])){
            echo"<p> El numero sin prefijo ni sufijo es: ".$_SESSION['mayorEdad']." </p>";
            session_destroy();
        }
    ?>
    <h2>Act 6</h2>
    <form action = "calculo1.php" method = "POST">
        <label>Introduzca una contraseña<input type = "password" name = "contra"></label>
        <label>Repita la contraseña<input type = "password" name = "contra2"></label>
        <input type = "submit">
    </form>
    <?php
        if(isset($_SESSION["contra"])){
            echo"<p>" .$_SESSION['contra']." </p>";
            session_destroy();
        }
    ?>
</body>

</html>