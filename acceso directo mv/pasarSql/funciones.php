<?php
session_start();
//Funcion preventiva para las inyecciones SQL


//creamos la coneccion con el servidor mysql
function coneccion(){
    $servidor = "localhost";
    $usuario = "root";
    $contra = "";
    try{
        return $conn = new PDO("mysql:host=$servidor;dbname=ejercicio1", $usuario, $contra);
        echo "conectado";
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = $e->getMessage();
         header("Location: index.php");
         die();
    }
}
function validacion($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
//Funcion para guardar los datos del registro en un archivo JSON
function subidaDato($nombre, $apellidos, $correo, $fecha, $contra, $img, $con)
{
    echo "empieza la fnc";
    try{
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Guardamos en una variable la instruccion sql para posteriormente ejecutarlo
        //Recuerda cambiarle los nombres en clase
        $sql = 'INSERT INTO usuarios (nombre, apellidos, correo, fechaNac, contra, rutaImg) VALUES ("'.$nombre.'","'.$apellidos.'","'.$correo.'","'.$fecha.'","'.$contra.'","'.$img.'")';
        $con -> exec($sql);
        echo "insertado";
        $con = null;
        header("Location: login.php");
        die();
    }catch(PDOException $e){
        echo "No insertado";
        $_SESSION["errores"]["db"] = $sql. "<br>" .$e->getMessage();
        header("Location: index.php");
     die();
    }
    // $datos = [$nombre, $apellidos, $correo, $fecha, $contra, $img];
    // $texto = json_encode($datos);
    // if (!file_exists("documentos/" . $correo . ".json")) {
    //     file_put_contents("documentos/" . $correo . ".json", $texto);
    //     unset($_SESSION["errores"]);
    //     header("Location: login.php");
    //     die();
    // } else {
    //     $_SESSION["errores"]["correo"] = "El correo intoducido ya existe";
    //     header("Location: registro.php");
    //     die();
    // }
    
}

function lecturaDatos($correoLog, $contraLog, $con)
{
    $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM usuarios WHERE correo = "'.$correoLog. '"';
    foreach($con -> query($sql) as $datos){
        if(($correoLog == $datos["correo"])){
            if(password_verify($contraLog, $datos["contra"])){
                $_SESSION["dato"]["nombreRec"] = $datos["nombre"];
                $_SESSION["dato"]["apellidosRec"] = $datos["apellidos"];
                $_SESSION["dato"]["correoRec"] = $datos["correo"];
                $_SESSION["dato"]["fechaRec"] = $datos["fechaNac"];
                $_SESSION["dato"]["rutaImg"] = $datos["rutaImg"];
                header("Location: login.php");
                die();
            }else{
                $_SESSION["errores"]["contraLog"] = "La contraseña introducida no es valida";
            }
         }else{
            $SESSION["errores"]["correoLog"] = "El correo introducido no existe";
         }
    }
    // $datos = file_get_contents("documentos/" . $correoLog . ".json");
    // $datosMatrices = json_decode($datos);
    // echo "<p>" . $correoLog . "</p>";
    // echo "<p>" . $contraLog . "</p>";
    // $nombreRec = $datosMatrices[0];
    // $apellidosRec = $datosMatrices[1];
    // $correoRec = $datosMatrices[2];
    // $fechaRec = $datosMatrices[3];
    // $contraRec = $datosMatrices[4];
    // $imgRec = $datosMatrices[5];
    // if (($correoLog == $correoRec) && (password_verify($contraLog, $contraRec))) {
    //     echo "<p>HOLA AQUI ESTOY</p>";
    //     $_SESSION["dato"]["nombreRec"] = $nombreRec;
    //     echo "<p>" . $_SESSION["dato"]["nombreRec"] . "</p>";
    //     var_dump($_SESSION["dato"]);
    //     $_SESSION["dato"]["apellidosRec"] = $apellidosRec;
    //     $_SESSION["dato"]["correoRec"] = $correoRec;
    //     $_SESSION["dato"]["fechaRec"] = $fechaRec;
    //     $_SESSION["dato"]["rutaImg"] = $imgRec;
    // } else {
    //     $_SESSION["errores"]["contraLog"] = "La contraseña introducida es incorrecta";
    // }
    /*header("Location: login.php");
    die();*/
}

$auxiliarReg = true;
/*Comprobaciones del registro de sesion*/
if ($_POST["nombreUsuario"] == "") {
    $_SESSION["errores"]["nombre"] = "Nombre de usuario no introducido";
    $auxiliarReg = false;
} else {
    if (preg_match('/^[a-zA-Z]{1}$/', $_POST["nombreUsuario"])) {
        echo "a";
        $_SESSION["errores"]["nombre"] = "El nombre tiene que tener mas de un caracter";
        $auxiliarReg = false;
    } else {
        $nombre = $_POST["nombreUsuario"];
        $nombre = validacion($nombre);
        $_SESSION['datos']['nombre'] = $nombre;
    }
}
if ($_POST["apellidoUsuario"] == "") {
    $_SESSION["errores"]["apellidos"] = "Apellidos no introducidos";
    $auxiliarReg = false;
} else {
    if (preg_match('/^[a-zA-Z]{1}$/', $_POST["apellidoUsuario"])) {
        $_SESSION["errores"]["apellidos"] = "El nombre tiene que tener mas de un caracter";
        $auxiliarReg = false;
    } else {
        $apellidos = $_POST["apellidoUsuario"];
        $apellidos = validacion($apellidos);
        $_SESSION['datos']['apellido'] = $apellidos;
    }
}
if ($_POST["correo"] == "") {
    $_SESSION["errores"]["correo"] = "El apartado del correo esta vacio";
    $auxiliarReg = false;
} else {
    if (!filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errores"]["correo"] = "El correo no cumple con los requisitos para que sea un correo";
        $auxiliarReg = false;
    } else {
        $correo = $_POST["correo"];
        $correo = validacion($correo);
        $_SESSION['datos']['correo'] = $correo;
    }
}
$separaciones = [];
if ($_POST["fechNac"] == "") {
    $_SESSION["errores"]["nacimiento"] = "El campo de la fecha de nacimiento esta vacio";
    $auxiliarReg = false;
} else {
    $fechNac = $_POST["fechNac"];
    $fechNac = validacion($fechNac);
    $_SESSION['datos']['fechNac'] = $fechNac;
}
if ($_POST["contra"] == "") {
    $_SESSION["errores"]["contra"] = "El elemento contraseña esta vacio";
    $auxiliarReg = false;
} else {
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{10,155}$/', $_POST["contra"])) {
        $_SESSION["errores"]["contra"] = "La contraseña no cumple con los parametros destacados";
        $auxiliarReg = false;
    } else {
        if ($_POST["contra"] != $_POST["contraRep"]) {
            $_SESSION["errores"]["contra"] = "Los dos apartados de la contraseña deben de coincidir";
            $auxiliarReg = false;
        } else {
            $contra = $_POST["contra"];
            $contra = validacion($contra);
            $contra = password_hash($contra, PASSWORD_DEFAULT);
        }
    }
}
//Comprobaciones de la subida de imagen

$subidaArchivo = "true";
$archivoTamanio = $_FILES['imagenUsuario']['size'];
echo $_FILES["imagenUsuario"]['name'];
if ($_FILES["imagenUsuario"]['size'] > 200000) {
    $msg = $msg . "El archivo es mayor que 200kb, debes reducirlo antes de subirlo <br>";
    $subidaArchivo = "false";
}
if (!$_FILES['imagenUsuario']['type'] == 'img/pjpeg' or !$_FILES['imagenUsuario']['type'] == 'image/png') {
    $msg = $msg . "El archivo tiene que ser o JPG o PNG<br>";
    $subidaArchivo = "false";
}
$archivoNombre = $_FILES["imagenUsuario"]["name"];
$anadir = "img/" . $archivoNombre;

if ($subidaArchivo == "true") {
    if (move_uploaded_file($_FILES["imagenUsuario"]["tmp_name"], $anadir)) {
    } else {
        $_SESSION["errores"]["archivo"] = $msg;
    }
} else {
    $_SESSION["errores"]["archivo"] = $msg;
}

//Comprobaciones para asegurar que los datos no esten vacios en el login
$auxLog = false;
if ($_POST["correoLog"] == "") {
    $_SESSION["errores"]["correoLog"] = "El area del correo esta vacia";
    $auxLog = false;
} else if (!filter_var($_POST["correoLog"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION["errores"]["correoLog"] = "Los datos del correo no son validos";
    $auxLog = false;
} else {
    $correoL = $_POST["correoLog"];
    $correoL = validacion($correoL);
}
if ($_POST["contraLog"] == "") {
    $_SESSION["errores"]["contraLog"] = "El area de la contraseña esta vacia";
    $auxLog = false;
} else {
    $contraL = validacion($_POST["contraLog"]);
    $auxLog = true;
}
if ($auxLog) {
    $conn = coneccion();
    lecturaDatos($correoL, $contraL, $conn);
}

//Subida de datos
if ($auxiliarReg) {
    $conn = coneccion();
    subidaDato($nombre, $apellidos, $correo, $fechNac, $contra, $anadir, $conn);
} else {
    header("Location: index.php");
    die();
}
