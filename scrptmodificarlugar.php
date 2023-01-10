<?php
    include('header.php');

    if($_POST['nombre'] != ""){
        $sql = "UPDATE `lugares` SET `nombre`='".$_POST['nombre']."' WHERE `lugar_id`='".$_POST['idlugar']."'";
        mysqli_query($link, $sql);
    }

    if($_POST['direccion'] != ""){
        $sql = "UPDATE `lugares` SET `direccion`='".$_POST['direccion']."' WHERE `lugar_id`='".$_POST['idlugar']."'";
        mysqli_query($link, $sql);
    }

    if($_POST['telefono'] != ""){
        $sql = "UPDATE `lugares` SET `telefono`='".$_POST['telefono']."' WHERE `lugar_id`='".$_POST['idlugar']."'";
        mysqli_query($link, $sql);
    }

    header("Location: lugares.php");
    die();
    exit;
?>