<?php

$pagina = <<<TEXTO

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Actividades</title>
</head>
<header>

TEXTO;

include('header.php');

echo($pagina);

$pagina = <<<TEXTO
    <h1 class="titulo">Actividades</h1>
    <p class="subtitulo">Historial de Actividades</p>
</header>
<div class="divisor"></div>
<body>
    <section name="nav">
        <div class="topnav mincontent">
            <a class="agregaractividad" href="agregaractividad.php">Añadir Actividad</a>
        </div>
    </section>
    <section name="displayactividades">
        <fieldset class="burbujarecomendacion">
            <div class="personalista">
                <p class="bold"><img src="iconos/persona.png" class="iconossugerencia">Leonel Messi, Lautaro Martinez</p>
                <p class="datospersona"><img src="iconos/check.png" class="iconossugerencia">Cafe</p>
                <p class="datospersona"><img src="iconos/reloj.png" class="iconossugerencia">16:00</p>
            <div class="divisor"></div>
                <p class="datospersona centered">Fuimos a tomar un cafe a la tarde para hablar de la situacion economica actual del pais. Messi menciono que es kirchnerista y que Baradel le parece una persona que quiere el bien comun.</p>
                <form action="eliminar.php?idactividad= ">
                    <input type="submit" value="Eliminar" class="eliminarboton">
                </form>
            </div>
        </fieldset>
        <fieldset class="burbujarecomendacion">
            <div class="personalista">
                <p class="bold"><img src="iconos/persona.png" class="iconossugerencia">Alberto Fernandez</p>
                <p class="datospersona"><img src="iconos/check.png" class="iconossugerencia">Cumpleaños</p>
                <p class="datospersona"><img src="iconos/reloj.png" class="iconossugerencia">21:00</p>
            <div class="divisor"></div>
                <p class="datospersona centered">Cumpleaños de Alberto en Olivos.</p>
                <form action="eliminar.php?idactividad= ">
                    <input type="submit" value="Eliminar" class="eliminarboton">
                </form>
            </div>
        </fieldset>
    </section>
</body>
<div class="divisor"></div>
</html>

TEXTO;

echo($pagina);

?>