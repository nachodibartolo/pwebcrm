<?php
include('header.php');

print_r($_POST);

$sql = "INSERT INTO `actividades`(`id_contacto`, `id_lugar`, `id_accion`, `descripcion`, `fecha`, `hora`, `user_id`) VALUES ('".$_POST['persona']."', '".$_POST['lugar']."', '".$_POST['accion']."', '".$_POST['notas']."', '".$_POST['dia']."', '".$_POST['hora']."', '".$_SESSION['user_id']."') ";
mysqli_query($link, $sql);

header("Location: actividad.php");
die();
exit;
?>