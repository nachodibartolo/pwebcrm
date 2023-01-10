<?php
include('header.php');

$target_dir = "userimg/";
$filename = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $filename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}
else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    
    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";

    $sql = "INSERT INTO `lugares`(`nombre`, `telefono`, `direccion`, `user_id`, `img`) VALUES ('".$_POST['nombre']."', '".$_POST['telefono']."', '".$_POST['direccion']."', '".$_SESSION['user_id']."', '".$filename."') ";
    $result = mysqli_query($link, $sql);

    header("Location: lugares.php");
    die();
    exit;

  } 
  else {
    echo "Sorry, there was an error uploading your file.";
  }
}




?>