<?php
    include '../coneccion/coneccion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar asignatura</title>
    <form action="logicaInsercion.php" method="POST">
        <label>Nombre de la asignatura
            <input type="text" name = "nombreAsig">
        </label><br>
        <input type="submit">
    </form>
</head>
<body>
    
</body>
</html>