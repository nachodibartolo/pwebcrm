<?php

include('header.php');

function randomizerbbdd($result){
    $row = "";
    if (mysqli_num_rows($result) > 1){
        $filaelegida = rand(1, mysqli_num_rows($result));
    }
    else{$filaelegida = 1;}

    $i = 1;
    $row = mysqli_fetch_assoc($result);
    while ($i < $filaelegida){
        $row = mysqli_fetch_assoc($result);
        $i++;
    }
    return $row;
}


$texto = <<<TEXTO
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="styles.css" rel="stylesheet">
<title>Inicio</title>
</head>
TEXTO;


/* -> Redirect si no esta logueado <- */

if($_SESSION['signed_in'] == 0) {
    session_start();
    session_destroy();
    header("Location: http://localhost/pwebcrm/login.php");
    die();
    exit;
}
/* != FIN Redirect si no esta logueado != */

echo($texto);

/* -> Request Persona <- */

$sql = "SELECT user_id, nombre, apellido, telefono, img FROM contactos WHERE user_id =  '".$_SESSION['user_id']."' ";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 0){
    $nombre = 'No tienes ningun contacto.';
    $apellido = '';
    $telefonopersona = '';
}
else{
    $row = randomizerbbdd($result);

    $nombre = $row['nombre'];
    $apellido  = $row['apellido'];
    $telefonopersona  = $row['telefono'];
    $img = $row['img'];
    if ($img == NULL){
        $img = 'fotopersona.jpg';
    }
}
/* != FIN Request Persona != */


/* -> Request Lugares <- */

$sql = "SELECT user_id, nombre, direccion, telefono, img FROM lugares WHERE user_id =  '".$_SESSION['user_id']."' ";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 0){
    $nombrelugar = 'No tienes ningun lugar cargado.';
    $direccion = '';
    $telefono = '';
    $imglugar = 'lugardefault.png';
    $nombrelugar2 = 'No tienes ningun lugar cargado.';
    $direccion2 = '';
    $telefono2 = '';
    $imglugar2 = 'lugardefault.png';
}
else{

    $row = randomizerbbdd($result);

    $nombrelugar = $row['nombre'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $imglugar = $row['img'];
    if ($imglugar == NULL){
        $imglugar = 'lugardefault.png';
    }

    $i = 0;
    $result = mysqli_query($link, $sql);
    $row2 = randomizerbbdd($result);
    while ($row2 == $row && $i < 10){
        $result = mysqli_query($link, $sql);
        $row2 = randomizerbbdd($result);
        $i++;
    }

    $nombrelugar2 = $row2['nombre'];
    $direccion2 = $row2['direccion'];
    $telefono2 = $row2['telefono'];
    $imglugar2 = $row2['img'];
    if ($imglugar2 == NULL){
        $imglugar2 = 'lugardefault.png';
    }
}
/* != FIN Request Lugar != */


/* -> Request Accion <- */

$sql = "SELECT user_id, accion FROM acciones WHERE user_id =  '".$_SESSION['user_id']."' ";
$result = mysqli_query($link, $sql);

$row = randomizerbbdd($result);

$accion = $row['accion'];
/* != Fin request accion != */


$texto = <<<TEXTO
<header>
    <h1 class="titulo">Dashboard</h1>
    <p class="subtitulo">Buenos Días <a class="bold">{$_SESSION['user_name']}</a>, lindo día para hacer algo!</p>
</header>
<div class="divisor"></div>
<body>
    <fieldset class="sugerencia">
        <h2>Que te parece hacer algo hoy con:</h2>
        <br>
        <img src="userimg/$img" alt="Foto de perfil" class="fotosugerencia">
        <p class="datossugerencia"><img src="iconos/persona.png" class="iconossugerencia">$nombre $apellido</p>
        <br>
        <p class="datossugerencia"><img src="iconos/check.png" class="iconossugerencia">$accion</p>
        <br>
        <p class="datossugerencia"><img src="iconos/organizacion.png" class="iconossugerencia">$nombrelugar</p>
        <br>
        <p class="datossugerencia"><img src="iconos/lugar.png" class="iconossugerencia">$direccion</p>
        <br>
        <a href="tel:$telefonopersona"><input type="button" value="Telefono: $telefonopersona" class="botonllamada"/></a>
    </fieldset>
    
    <fieldset class="recomendaciones">
        <fieldset class="recomendacion izq">
            <h2 class="bold"><img src="iconos/organizacion.png" class="iconossugerencia">$nombrelugar</h2>
            <p class="datossugerencia"><img src="iconos/lugar.png" class="iconossugerencia">$direccion</p>
            <a href="tel:$telefono"><input type="button" value="Telefono: $telefono" class="botonllamada"/></a>
        </fieldset>
        <img src="userimg/$imglugar" alt="Foto pizeria" class="fotorecomendacion">
        <div class="divisor"></div>
        <img src="userimg/$imglugar2" alt="Foto cerveceria" class="fotorecomendacion">
        <fieldset class="recomendacion der">
            <h2 class="bold"><img src="iconos/organizacion.png" class="iconossugerencia">$nombrelugar2</h2>
            <p class="datossugerencia"><img src="iconos/lugar.png" class="iconossugerencia">$direccion2</p>
            <a href="tel:$telefono2"><input type="button" value="Telefono: $telefono2" class="botonllamada"/></a>
        </fieldset>
    </fieldset>

    <div class="divisor"></div>
</body>
<footer class="footer">
    <p>Creado por <a href="https://github.com/ignaciodibartolo">Ignacio Di Bartolo</a></p>
    <p>UCA 2022</p>
</footer>
</html>
TEXTO;

echo($texto);

?>