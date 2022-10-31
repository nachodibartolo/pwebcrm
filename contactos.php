<?php

$texto = <<<TEXTO

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Contactos</title>
</head>
<header>
TEXTO;

echo($texto);

include('header.php');

$texto = <<<TEXTO
    <h1 class="titulo"> Mis contactos</h1>
</header>
<div class="divisor"></div>
<body>
    <section name="nav">
        <div class="navabc">
        <a>A</a>
        <a>B</a>
        <a>C</a>
        <a>D</a>
        <a>E</a>
        <a>F</a>
        <a>G</a>
        <a>H</a>
        <a>I</a>
        <a>J</a>
        <a>K</a>
        <a>L</a>
        <a>M</a>
        <a>N</a>
        <a>Ñ</a>
        <a>O</a>
        <a>P</a>
        <a>Q</a>
        <a>R</a>
        <a>S</a>
        <a>T</a>
        <a>U</a>
        <a>V</a>
        <a>X</a>
        <a>Y</a>
        <a>Z</a>
        <a class="agregar" href="agregarcontacto.html">Añadir Contacto</a>
        </div>
    </section>
    <section name="outputcontactos">
        <fieldset class="outcontactos">
            <div class="personalista">
                <p class="bold"><img src="iconos/persona.png" class="iconossugerencia">Leonel Messi</p>
                <p class="datospersona"><img src="iconos/telefono.png" class="iconossugerencia">11 5961 3577</p>
                <p class="datospersona"><img src="iconos/lugar.png" class="iconossugerencia">Bonpland 2117, C1425FWA CABA</p>
            </div>
            <div class="divisor"></div>
            <div class="personalista">
                <p class="bold"><img src="iconos/persona.png" class="iconossugerencia">Lautaro Martinez</p>
                <p class="datospersona"><img src="iconos/telefono.png" class="iconossugerencia">11 5961 3577</p>
                <p class="datospersona"><img src="iconos/lugar.png" class="iconossugerencia">Bonpland 2117, C1425FWA CABA</p>
            </div>
            <div class="divisor"></div>
            <div class="personalista">
                <p class="bold"><img src="iconos/persona.png" class="iconossugerencia">Angel Di Maria</p>
                <p class="datospersona"><img src="iconos/telefono.png" class="iconossugerencia">11 5961 3577</p>
                <p class="datospersona"><img src="iconos/lugar.png" class="iconossugerencia">Bonpland 2117, C1425FWA CABA</p>
            </div>
        </fieldset>
    </section>
</body>
<div class="divisor"></div>
<footer class="footer">
    <p>Creado por <a href="https://github.com/ignaciodibartolo">Ignacio Di Bartolo</a></p>
    <p>UCA 2022</p>
</footer>
</html>

TEXTO;

echo($texto);

?>