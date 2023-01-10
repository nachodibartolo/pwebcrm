<?php
include ('header.php');

$sql = "DELETE FROM contactos WHERE id_contacto={$_POST['idcontacto']}";

$result = mysqli_query($link, $sql);

header("Location: contactos.php");
die();
exit;

?>