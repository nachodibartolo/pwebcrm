
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
    <h1 class="titulo">Actividades</h1>
    <p class="subtitulo">Historial de Actividades</p>
</header>
<div class="divisor"></div>
<body>
    <section name="nav">
        <div class="topnav mincontent">
            <a class="agregaractividad" href="agregaractividad.php">Añadir Actividad</a>
            <a class="agregaractividad" href="agregaraccion.php">Añadir Accion</a>
        </div>
    </section>
<section name="displayactividades">
TEXTO;

include('header.php');

$sql = "SELECT `id_actividad`, `user_id`, `id_lugar`, `id_contacto`, `id_accion`, `hora`, `fecha`, `descripcion` FROM actividades WHERE user_id = ".$_SESSION['user_id']." ORDER BY fecha DESC";
$result = mysqli_query($link, $sql);

function cronologia($result, $link){

    $row = mysqli_fetch_assoc($result);
    while ($row != NULL){

        $sql = "SELECT nombre, apellido, user_id, id_contacto FROM contactos WHERE user_id = ".$_SESSION['user_id']." AND id_contacto = ".$row['id_contacto']." ";
        $result2 = mysqli_query($link, $sql);
        $row2 = mysqli_fetch_assoc($result2);
        if ($row2 == NULL){
            $persona = "Persona eliminada";
        } else {
            $persona = $row2['nombre']." ".$row2['apellido'];
        }

        $sql = "SELECT nombre, user_id, lugar_id FROM lugares    WHERE user_id = ".$_SESSION['user_id']." AND lugar_id = ".$row['id_lugar']." ";
        $result2 = mysqli_query($link, $sql);
        $row2 = mysqli_fetch_assoc($result2);
        if ($row2 == NULL){
            $lugar = "Lugar eliminado";
        } else {
            $lugar = $row2['nombre'];
        }

        $idactividad = $row['id_actividad'];


        echo "<fieldset class='burbujarecomendacion'>
        <div class='personalista'>
            <p class='bold'><img src='iconos/persona.png' class='iconossugerencia'>$persona</p>
            <p class='datospersona'><img src='iconos/organizacion.png' class='iconossugerencia'>$lugar</p>
            <p class='datospersona'><img src='iconos/reloj.png' class='iconossugerencia'>{$row['fecha']} @ {$row['hora']}</p>
        <div class='divisor'></div>
            <p class='datospersona centered'>{$row['descripcion']}</p>
            <form method='POST' action='scrpteliminaractividad.php?='>
                <input type='hidden' name='id_actividad' value='$idactividad'>
                <input type='submit' value='Eliminar' class='eliminarboton'>
            </form>
        </div>
    </fieldset>";

    $row = mysqli_fetch_assoc($result);
    }
}

echo($pagina);

cronologia($result, $link);


$pagina = <<<TEXTO
        </section>
    </body>
<div class="divisor"></div>
</html>
TEXTO;

echo($pagina);

?>