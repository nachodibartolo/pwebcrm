<?php
include ('header.php');

$sql = "DELETE FROM actividades WHERE id_actividad={$_POST['id_actividad']}";

$result = mysqli_query($link, $sql);

header("Location: actividad.php");
die();
exit;

?>