<?php

include('header.php');

/* -> Seleccionar Personas <- */

function opersonas($link){
    $sql = "SELECT id_contacto, user_id, nombre, apellido, telefono FROM contactos WHERE user_id =  '".$_SESSION['user_id']."' ";
    $result = mysqli_query($link, $sql);

    echo '<label for="persona"><a class="bold leyendainputcontacto">Persona:</a></label>
    <br><select id="persona" name="persona" class="inputcontacto" required/>
    <option value="0">Seleccione una Persona</option>';

    $row = mysqli_fetch_assoc($result);
    while ($row['nombre'] != NULL){
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];   
        $idpersona = $row['id_contacto'];
        echo "<option value='$idpersona'>$nombre $apellido</option>";
        $row = mysqli_fetch_assoc($result);
    }
    echo '</select>';
}
/* != FIN Seleccionar Personas != */


/* -> Seleccionar Lugares <- */

function olugares($link){
    $sql = "SELECT user_id, nombre, lugar_id FROM lugares WHERE user_id =  '".$_SESSION['user_id']."' ";
    $result = mysqli_query($link, $sql);

    echo '<label for="lugar"><a class="bold leyendainputcontacto">Lugar:</a></label>
    <br><select id="lugar" name="lugar" class="inputcontacto" required/>
    <option value="0">Seleccione un Lugar</option>';

    $row = mysqli_fetch_assoc($result);
    while ($row['nombre'] != NULL){
        $nombre = $row['nombre'];
        $idlugar = $row['lugar_id'];
        echo "<option value='$idlugar'>$nombre</option>";
        $row = mysqli_fetch_assoc($result);
    }
    echo '</select>';
}
/* != FIN Seleccionar Lugares != */


/* -> Seleccionar Accion <- */

function oacciones($link){
    $sql = "SELECT user_id, accion, accion_id FROM acciones WHERE user_id =  '".$_SESSION['user_id']."' ";
    $result = mysqli_query($link, $sql);

    echo '<label for="accion"><a class="bold leyendainputcontacto">Actividad:</a></label>
    <br><select id="accion" name="accion" class="inputcontacto" required/>
    <option value="0">Seleccione una Actividad</option>';

    $row = mysqli_fetch_assoc($result);
    while ($row['accion'] != NULL){
        $nombre = $row['accion'];
        $idaccion = $row['accion_id'];
        echo "<option value='$idaccion'>$nombre</option>";
        $row = mysqli_fetch_assoc($result);
    }
    echo '</select>';
}
/* != FIN Seleccionar Accion != */



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
    <h1 class="titulo">Añadir Actividad</h1>
</header>
<body>
    <div>
        <div class="divisor"></div>
        <fieldset class="fieldagregarusuario">
            <form method="post" action="scrptagregaractividad.php" enctype="multipart/form-data">
                <img src="iconos/check.png" class="fotoagragarcontacto"/>
                <br>
TEXTO;
echo ($texto);
                    opersonas($link);

                    olugares($link);

                    oacciones($link);
$texto = <<<TEXTO
                <label for="dia"><a class="bold leyendainputcontacto">Día:</a>
                <br><input type="date" id="dia" name="dia" class="inputcontacto" pattern="+[0-9]{2-3} [0-9]{1-3} [0-9]{1-4} [0-9]{1-4}" required/></label>
                <label for="hora"><a class="bold leyendainputcontacto">Hora:</a>
                <br><input type="time" id="hora" name="hora" class="inputcontacto"/></label>
                <label for="Notas:"><a class="bold leyendainputcontacto">Notas:</a>
                <br><textarea type="text" id="notas" name="notas" rows="4" class="inputcontactotextarea" placeholder="Ingrese anotaciones deel evento aquí" ></textarea></label>
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