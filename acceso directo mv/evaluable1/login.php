<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['dato'])) {
        echo '<form method = "POST" action="funciones.php">
        <label>Email<input type = "mail" name ="correoLog" placeholder="example@mail.com"></label><br>
        <label>Contraseña<input type = "password" name = "contraLog"></label><br>
        <input type = "submit" name = "enviar">
        </form>';
    } else if (isset($_COOKIE["sesion"])) {
        echo "<a href = 'eliminar.php'><button>Eliminar cuenta</button></a><br>";
        $datos = json_decode($_COOKIE["sesion"]);
        $nombreRec = $datos[0];
        echo "<p>Nombre: " . $nombreRec . "</p>";
        $apellidosRec = $datos[1];
        echo "<p>Apellidos: " . $apellidosRec . "</p>";
        $correoRec = $datos[2];
        echo "<p>Correo: " . $correoRec . "</p>";
        $fechaRec = $datos[3];
        echo "<p>Fecha de nacimiento: " . $fechaRec ."</p>";
        echo "<a href = 'cerrar.php'><button>Cerrar sesion</button>";
    } else {
        echo "<a href = 'eliminar.php'><button>Eliminar cuenta</button></a><br>";
        echo "<p>Nombre: " . $_SESSION['dato']['nombreRec'] . "</p>";
        echo "<p>Apellidos: " . $_SESSION['dato']['apellidosRec'] . "</p>";
        echo "<p>Correo: " . $_SESSION['dato']['correoRec'] . "</p>";
        echo "<p>Fecha de nacimiento: " . $_SESSION['dato']['fechaRec'] . "</p>";
        echo $_SESSION["dato"]['rutaImg']. "<br>";
        echo "<img src = '" . $_SESSION["dato"]['rutaImg'] . "'><br>";
        if ($_SESSION["dato"]['rutaImg'] == "img/") {
            echo "hola";
        }
        echo "<form action = 'kamehause.php' method = 'POST'>
            <input type = 'checkbox' id = 'galleta' name = 'galleta' value = 'si'><label for = 'galleta'>Guardar la sesion</label><br>
            <input type = 'submit'><br><br>
            </form>";
        echo "<a href = 'cerrar.php'><button>Cerrar sesion</button>";
        if (isset($_SESSION["errores"]["eliminar"])) {
            echo "<p style = 'color: red'>" . $_SESSION["errores"]["eliminar"] . "</p>";
        }
    }
    ?>

    <?php
    if (isset($_SESSION["errores"]["correoLog"])) {
        echo "<p style = 'color: red'>" . $_SESSION["errores"]["correoLog"] . "</p>";
        session_destroy();
    }
    if (isset($_SESSION["errores"]["contraLog"])) {
        echo "<p style = 'color: red'>" . $_SESSION["errores"]["contraLog"] . "</p>";
        session_destroy();
    }
    ?>
</body>

</html>