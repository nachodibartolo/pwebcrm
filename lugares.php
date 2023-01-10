<?php

$texto = <<<TEXTO

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Lugares</title>
</head>
<header>
TEXTO;

echo($texto);

include('header.php');

$sql = "SELECT user_id, nombre, telefono, direccion, lugar_id, img FROM lugares WHERE user_id =  '".$_SESSION['user_id']."' ";
$result = mysqli_query($link, $sql);

function buscarcontacto($result){
    if (mysqli_num_rows($result) == 0){
        echo '<div class="personalista">
        <p class="bold">No tienes ningún Lugar!</p>
        </div>
        <div class="divisor"></div>';
    }
    else{
        $row = mysqli_fetch_assoc($result);
        while ($row != NULL){

            $nombre = $row['nombre'];
            $telefono = $row['telefono'];
            $direccion = $row['direccion'];
            $idlugar = $row['lugar_id'];
            $img = $row['img'];

            if ($img == NULL){
                $img = 'lugardefault.png';
            }

            echo "<div class='personalista'>
                        <section name = 'datoscontacto' class='bloque izq'>
                            <p class='bold'><img src='iconos/persona.png' class='iconossugerencia'>$nombre</p>
                            <p class='datospersona'><img src='iconos/telefono.png' class='iconossugerencia'>$telefono</p>
                            <p class='datospersona'><img src='iconos/lugar.png' class='iconossugerencia'>$direccion</p>
                        </section>
                        <section name = 'imagenpersona' class='bloque der'>
                            <img src='userimg/$img' class='fotocontacto'>
                        </section>
                        <br>
                        <section name = 'datoscontacto' class='centro'>
                            <form method='POST' action='modificarlugar.php?=$idlugar'>
                                <input type='hidden' name='idlugar' value='$idlugar'>
                                <input type='submit' value='Modificar' class='modificarboton'>
                            </form>
                            <form method='POST' action='scrpteliminarlugar.php?=$idlugar'>
                                <input type='hidden' name='idlugar' value='$idlugar'>
                                <input type='submit' value='Eliminar' class='eliminarboton'>
                            </form>
                        </section>
                    </div> 
                    <div class='divisor'></div>";
            $row = mysqli_fetch_assoc($result);
        }
    }
}

$texto = <<<TEXTO
                <h1 class="titulo">Mis Lugares</h1>
            </header>
            <div class="divisor"></div>
            <body>
                <section name="nav">
                    <div class="topnav mincontent">
                        <a class="agregaractividad" href="agregarlugar.php">Añadir Lugar</a>
                    </div>
                </section>
                <section name="outputcontactos">
                    <fieldset class="outcontactos">
            TEXTO;

            echo($texto);

            buscarcontacto($result);
            
            $texto = <<<TEXTO
                    </fieldset>
                </section>
            </body>
<footer class="footer">
    <p>Creado por <a href="https://github.com/ignaciodibartolo">Ignacio Di Bartolo</a></p>
    <p>UCA 2022</p>
</footer>
</html>

TEXTO;

echo($texto);



?>