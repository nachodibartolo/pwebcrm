<?php

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

include('header.php');

$texto = <<<TEXTO
    <h1 class="titulo">Añadir Contacto</h1>
</header>
<body>
    
    <div>
        <div class="divisor"></div>
        <fieldset class="fieldagregarusuario">
            <form>
                <img src="iconos/persona.png" class="fotoagragarcontacto"/>
                <br>
                <label for="nombre"><a class="bold leyendainputcontacto">Nombre:</a>
                <br><input type="text" id="nombre" name="nombre" class="inputcontacto" placeholder=" Ignacio" required/></label>
                <label for="apellido"><a class="bold leyendainputcontacto">Apellido:</a>
                <br><input type="text" id="apellido" name="apellido" class="inputcontacto" placeholder=" Di Bartolo" required/></label>
                <label for="telefono"><a class="bold leyendainputcontacto">Telefono:</a>
                <br><input type="tel" id="telefono" name="telefono" class="inputcontacto" placeholder=" +54 911 9232-2342" pattern="+[0-9]{2-3} [0-9]{1-3} [0-9]{1-4} [0-9]{1-4}" required/></label>
                <label for="direccion"><a class="bold leyendainputcontacto">Direccion:</a>
                <br><input type="text" id="direccion" name="direccion" class="inputcontacto" placeholder=" AV. 9 de julio 1293"/></label>
                <label for="cumple" class="bold leyendainputcontacto">Cumpleaños:</label>
                <br><input type="date" id="cumple" name="cumple" class="inputcontacto"/>
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
