<?php
include ("header.php");

if (isset($_POST['nombre'])){
    $sql = "INSERT INTO `acciones` (`accion`, `user_id`) VALUES ('".$_POST['nombre']."', '".$_SESSION['user_id']."')";
    mysqli_query($link, $sql);
    header("actividad.php");
    die();
    exit;
}


$texto = <<<TEXTO

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Agregar Contacto</title>
</head>
<header>
TEXTO;

echo($texto);

$texto = <<<TEXTO
    <h1 class="titulo">Añadir Accion</h1>
</header>
<body>
    
    <div>
        <div class="divisor"></div>
        <fieldset class="fieldagregarusuario">
            <form method="post" action="agregaraccion.php" enctype="multipart/form-data">
                <img src="iconos/check.png" class="fotoagragarcontacto"/>
                <br>
                <label for="nombre"><a class="bold leyendainputcontacto">Nombre acción:</a>
                <br><input type="text" id="nombre" name="nombre" class="inputcontacto" placeholder=" Gimnasio" required/></label>
                <input type="submit" value="Añadir" class="botoningreso bold"/>
            </form>
        </fieldset>
        <div class="divisor"></div>
    </div>
</body>
</html>

TEXTO;

echo($texto);

?>
