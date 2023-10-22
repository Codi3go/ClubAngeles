<?php
    // invocamos el inicio de sesiones para hacer uso de las mismas
    session_start();
    // con esta funcion, estamos destruyendo todas las variables de sessiones que pudimos haber creado
    session_destroy();
    // con esta funcion, estamos liberando todas las variables de sessiones que pudimos haber creado
    session_unset();
    // y por ultimo como el usuario ya cerró sesion y ya no existen variables de sesion
    // lo re dirigimos al index para que si quiere, vuelva e inicie sesion
    header("Location: ../index.php");
?>