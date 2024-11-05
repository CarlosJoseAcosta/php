<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form enctype="multipart/form-data" method = "POST" action="funciones.php">
        <label>Nombre:*<input type="text" name = "nombreUsuario" placeholder="Introduzca su nombre" <?php if(isset($_SESSION['datos']['nombre'])) echo "value = '".$_SESSION['datos']['nombre']."'"; if(isset($_SESSION["errores"]["nombre"])) echo "<style = 'color: red'";?>><br><br></label>
        <label>Apellidos:*<input type="text" name="apellidoUsuario" placeholder="Introduzca su apellido" <?php if(isset($_SESSION['datos']['apellido'])) echo "value = '".$_SESSION['datos']['apellido']."'";?>></label><br><br>
        <label>Email*<input type = "mail" name ="correo" placeholder="example@mail.com" <?php if(isset($_SESSION['datos']['correo'])) echo "value = '".$_SESSION['datos']['correo']."'";?>></label><br><br>
        <label>Fecha de nacimiento*:<input type = "date" name = "fechNac" <?php if(isset($_SESSION['datos']['fechNac'])) echo "value = '".$_SESSION['datos']['fechNac']."'";?>></label><br><br>
        <label>Contraseña*:<input type = "password" name = "contra"></label><br><br>
        <label>Repita su contraseña*:<input type="password" name = "contraRep"></label><br>
        <p>**La contraseña debe tener mínimo 10 caracteres, con mayusculas y minusculas, algun numero y algun simbolo**</p>
        <label>Suba una imagen: <input type="file" name = "imagenUsuario"></label><br><br>
        ¿Ya tienes una cuenta?<a href="login.php"> Inicia sesion</a><br><br>
        <input type = "submit" name = "enviar">
    </form>
    <?php
        if(isset($_SESSION["info"])){
            echo "<p style = 'color: green>" .$_SESSION["info"]. "</p>";
        }
        if(isset($_SESSION["errores"]["nombre"])){
            echo "<p style = 'color: red'>" .$_SESSION["errores"]["nombre"]. "</p>";
        }
        if(isset($_SESSION["errores"]["apellidos"])){
            echo "<p style = 'color: red'>" .$_SESSION["errores"]["apellidos"]. "</p>";
        }
        if(isset($_SESSION["errores"]["correo"])){
            echo "<p style = 'color: red'>" .$_SESSION["errores"]["correo"]. "</p>";
        }
        if(isset($_SESSION["errores"]["nacimiento"])){
            echo "<p style = 'color: red'>" .$_SESSION["errores"]["nacimiento"]. "</p>";
        }
        if(isset($_SESSION["errores"]["contra"])){
            echo "<p style = 'color: red'>" .$_SESSION["errores"]["contra"]. "</p>";
        }
        if(isset($_SESSION["errores"]["archivo"])){
            echo "<p style = 'color: red'>" .$_SESSION["errores"]["archivo"]. "</p>";
        }
        
        session_destroy();
    ?>
</body>
</html>