<?php

$texto = <<<TEXTO

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Login</title>
</head>

<header>

TEXTO;

include('header.php');

if (isset($_POST["usuario"]) && isset($_POST["contrasenia"]) && $_POST["usuario"] != "" && $_POST["contrasenia"] != ""){

    $sql = "SELECT user_name, user_pass, user_id FROM usuarios WHERE user_name = '".mysqli_real_escape_string($link, $_POST['usuario'])."' AND user_pass = '".mysqli_real_escape_string($link, $_POST['contrasenia'])."' ";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo '<a>Usuario o contraseña incorrecta. Intentelo otra vez.</a>';
    }
    else {
        $_SESSION['signed_in'] = true;

        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
        }

        header("Location: index.php");
        die();
        exit;
    }
}

echo($texto);


$texto = <<<TEXTO
    <h1 class="titulo">Bienvenido a tu CRM personal!</h1>
    <p class="subtitulo">Mantene tu vida social ordenada.</p>
</header>
<div class="divisor"></div>
<body>
    <div>
        <img class="logologin" src="fotos/loginlogo.gif"/>
    </div>
    <div>
        <fieldset class="login" method="post">
            <form method="POST" action="">
            <br>
            <label for="usuario"><a class="bold">Usuario:</a>
            <br><input type="text" id="usuario" name="usuario" class="inputcred"/></label>
            <br>
            <label for="contrasenia"><a class="bold">Contaraseña:</a>
            <br><input type="password" id="contrasenia" name="contrasenia" class="inputcred"/></label>
            <input type="submit" id="boton" value="Ingresar" class="botoningreso bold">
            </form>
            <br>
            <p> Si no tienes usuario, <a href="registro.php"> Registrate aqui. </a>
        </fieldset>
        <div class="divisor"></div>
    </div>
    <footer class="footer">
        <p>Creado por <a href="https://github.com/ignaciodibartolo">Ignacio Di Bartolo</a></p>
        <p>UCA 2022</p>
    </footer>
</body>
</html>

TEXTO;

echo($texto);

?>
