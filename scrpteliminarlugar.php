<?php
include ('header.php');

$sql = "DELETE FROM lugares WHERE lugar_id={$_POST['idlugar']}";

$result = mysqli_query($link, $sql);

header("Location: lugares.php");
die();
exit;

?>