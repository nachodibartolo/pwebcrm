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

echo($texto);

include('header.php');

if (isset($_POST["usuario"]) && $_POST["usuario"] != ""){

    $usuario = $_POST['usuario'];
    $pass = $_POST['contrasenia'];
    $mail = $_POST['email'];
    $bday = $_POST['cumple'];

    $sql = "INSERT INTO usuarios (user_name, user_pass, user_mail, user_nacimiento) VALUES ( '$usuario', '$pass', '$mail', '$bday')";
    $result = mysqli_query($link, $sql);

    if (!$result) {
        echo 'Ocurrió un error';    
        echo mysqli_error($link);
    } else {
        echo '<h1 class="titulo correcto">Registrado exitosamente <a href="login.php">Iniciar Sesión</a></h1>';
    }
}

$texto = <<<TEXTO
    <h1 class="titulo">Registro</h1>
    <p class="subtitulo">Mantene tu vida social ordenada.</p>
</header>
<div class="divisor"></div>
<body>
    <div>
        <fieldset class="registro">
            <form method="POST">
                <br>
                <label for="usuario" class="bold">Usuario:</label>
                <br><input type="text" id="usuario" name="usuario" class="inputcred" required/>
                <br>
                <label for="contrasenia" class="bold">Contaraseña:</label>
                <br><input type="text" id="contrasenia" name="contrasenia" class="inputcred" required/>
                <br>
                <label for="email" class="bold">Email:</label>
                <br><input type="email" id="email" name="email" class="inputcred" required/>
                <br>
                <label for="cumple" class="bold">Fecha de nacimiento:</label>
                <br><input type="date" id="cumple" name="cumple" class="inputcred" required/>
                <br>
                <label for="terminos">Acepto los <a href="https://www.facebook.com/legal/terms" class="link">terminos y condiciones:</a></label>
                <input type="checkbox" id="terminos" name="termninos" class="inputcred" required>
                <input type="submit" id="boton" value="Ingresar" class="botoningreso bold" disabled>
            </form>
        </fieldset>
        <div class="divisor"></div>
    </div>
    <footer class="footer">
        <p>Creado por <a href="https://github.com/ignaciodibartolo">Ignacio Di Bartolo</a></p>
        <p>UCA 2022</p>
    </footer>
	<script src="js/registro.js" charset="utf-8"></script>
</body>
</html>

TEXTO;

echo($texto);

?>
