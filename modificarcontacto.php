<?php

$texto = <<<TEXTO

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Modificar Contacto</title>
</head>
<header>
TEXTO;

echo($texto);

include('header.php');

$sql = "SELECT * FROM `contactos` WHERE id_contacto=".$_POST['idcontacto']." AND user_id=".$_SESSION['user_id']." ";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$nombre = $row['nombre'];
$apellido = $row['apellido'];
$telefono = $row['telefono'];
$direccion = $row['direccion'];
$cumple = $row['cumple'];
$idcontacto = $row['id_contacto'];


$texto = <<<TEXTO
    <h1 class="titulo">Modificar Contacto</h1>
</header>
<body>
    
    <div>
        <div class="divisor"></div>
        <fieldset class="fieldagregarusuario">
            <form method='POST' action='scrptmodificarcontacto.php?=$idcontacto'>
                <input type='hidden' name='idcontacto' value='$idcontacto'>
                <img src="iconos/persona.png" class="fotoagragarcontacto"/>
                <p class="datossugerencia">Deje en blanco los datos que no quiera modificar.</p>
                <br>
                <label for="nombre"><a class="bold leyendainputcontacto">Nombre:</a>
                <br><input type="text" id="nombre" name="nombre" class="inputcontacto" placeholder="$nombre"/></label>
                <label for="apellido"><a class="bold leyendainputcontacto">Apellido:</a>
                <br><input type="text" id="apellido" name="apellido" class="inputcontacto" placeholder="$apellido"/></label>
                <label for="telefono"><a class="bold leyendainputcontacto">Telefono:</a>
                <br><input type="tel" id="telefono" name="telefono" class="inputcontacto" placeholder="$telefono" pattern="+[0-9]{2-3} [0-9]{1-3} [0-9]{1-4} [0-9]{1-4}"/></label>
                <label for="direccion"><a class="bold leyendainputcontacto">Direccion:</a>
                <br><input type="text" id="direccion" name="direccion" class="inputcontacto" placeholder="$direccion"/></label>
                <label for="cumple" class="bold leyendainputcontacto">Cumpleaños:</label>
                <br><input type="date" id="cumple" name="cumple" class="inputcontacto"/>
                <input type="submit" value="Modificar" class="botoningreso bold"/>
            </form>
        </fieldset>
        <div class="divisor"></div>
    </div>
</body>
</html>

TEXTO;

echo($texto);

?>
