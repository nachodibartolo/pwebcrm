<?php

/* Inicio de sesión */

session_start();

if (!isset($_SESSION['signed_in'])){
    $_SESSION['singed_in'] = 0;
}


/* Coneccion con la base de datos */

$link = mysqli_connect('localhost', 'root', '', 'pwebcrm');

if (!$link) {
    exit('Error: No se pudo conectar con la base de datos');
}

/* navbar */

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
    echo("<div class='topnav'>
    <a class='izq' href='index.php'>Inicio</a>
    <a class='izq' href='actividad.php'>Actividad</a>
    <a class='izq' href='contactos.php'>Contactos</a>
    <a class='izq' href='lugares.php'>Lugares</a>
    <a class='der' href='logout.php'>Logout</a>
    </div>");
}

else {
    echo("<div class='topnav'>
    <a class='der' href='login.php'>Login</a>
    <a class='der' href='registro.php'>Registro</a>
    </div>");
}
?>