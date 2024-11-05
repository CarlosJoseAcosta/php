<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        echo "<p>Nombre:" .$nombre. "</p> <p> Correo: ".$correo. "</p>"
    ?>
</body>
</html>