<?php
    include('header.php');

    if($_POST['nombre'] != ""){
        $sql = "UPDATE `contactos` SET `nombre`='".$_POST['nombre']."' WHERE `id_contacto`='".$_POST['idcontacto']."'";
        mysqli_query($link, $sql);
    }

    if($_POST['apellido'] != ""){
        $sql = "UPDATE `contactos` SET `apellido`='".$_POST['apellido']."' WHERE `id_contacto`='".$_POST['idcontacto']."'";
        mysqli_query($link, $sql);
    }

    if($_POST['direccion'] != ""){
        $sql = "UPDATE `contactos` SET `direccion`='".$_POST['direccion']."' WHERE `id_contacto`='".$_POST['idcontacto']."'";
        mysqli_query($link, $sql);
    }

    if($_POST['telefono'] != ""){
        $sql = "UPDATE `contactos` SET `telefono`='".$_POST['telefono']."' WHERE `id_contacto`='".$_POST['idcontacto']."'";
        mysqli_query($link, $sql);
    }

    if($_POST['cumple'] != ""){
        $sql = "UPDATE `contactos` SET `cumple`='".$_POST['cumple']."' WHERE `id_contacto`='".$_POST['idcontacto']."'";
        mysqli_query($link, $sql);
    }

    header("Location: contactos.php");
    die();
    exit;
?>