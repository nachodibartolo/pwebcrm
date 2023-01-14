<?php

$texto = <<<TEXTO

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Agregar Actividad</title>
</head>
<header>
TEXTO;

echo($texto);

include('header.php');

$texto = <<<TEXTO
    <h1 class="titulo">Añadir Actividad</h1>
</header>
<body>
    <div>
        <div class="divisor"></div>
        <fieldset class="fieldagregarusuario">
            <form>
                <img src="iconos/check.png" class="fotoagragarcontacto"/>
                <br>
                <label for="actividad"><a class="bold leyendainputcontacto">Actividad:</a></label>
                <br><select id="actividad" name="actividad" class="inputcontacto">
                    <option value="Cafe">Cafe</option>
                    <option value="reunion">Reunion</option>
                    <option value="cumple">Cumpleaños</option>
                    <option value="otro">Otro</option>
                </select>
                <label for="persona"><a class="bold leyendainputcontacto">Personas:</a>
                <br><input type="text" id="persona" name="persona" class="inputcontacto" placeholder="Leonel Messi" required/></label>
                <label for="dia"><a class="bold leyendainputcontacto">Día:</a>
                <br><input type="date" id="dia" name="dia" class="inputcontacto" pattern="+[0-9]{2-3} [0-9]{1-3} [0-9]{1-4} [0-9]{1-4}" required/></label>
                <label for="hora"><a class="bold leyendainputcontacto">Hora:</a>
                <br><input type="time" id="hora" name="hora" class="inputcontacto"/></label>
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