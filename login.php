<?php

$texto = <<<TEXTO

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Login</title>
</head>

<header>
TEXTO;


echo($texto);

include('header.php');

$texto = <<<TEXTO
    <h1 class="titulo">Bienvenido a tu CRM personal!</h1>
    <p class="subtitulo">Mantene tu vida social ordenada.</p>
</header>
<div class="divisor"></div>
<body>
    <div>
        <img class="logologin" src="fotos/loginlogo.gif"/>
    </div>
    <div>
        <fieldset class="login" method="post">
            <form>
                <br>
                <label for="usuario"><a class="bold">Usuario:</a>
                <br><input type="text" id="usuario" name="usuario" class="inputcred error"/></label>
                <br>
                <label for="contrasenia"><a class="bold">Contaraseña:</a>
                <br><input type="text" id="contrasenia" name="contrasenia" class="inputcred error"/></label>
                <input type="submit" id="boton" value="Ingresar" class="botoningreso bold" disabled>
            </form>
        </fieldset>
        <div class="divisor"></div>
    </div>
    <footer class="footer">
        <p>Creado por <a href="https://github.com/ignaciodibartolo">Ignacio Di Bartolo</a></p>
        <p>UCA 2022</p>
    </footer>
	<script src="js/login.js" charset="utf-8"></script>
</body>
</html>

TEXTO;

echo($texto);

?>
