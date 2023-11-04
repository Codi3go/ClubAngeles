<?php
//Iniciamos el uso de ssiones
session_start();
/* Validamos si no existe el key username dentro del array asociativo $_SESSION
Si dicho key no existe, es porque el usuario no ha iniciado sesión y está intentando entrar al welcome, entonces usamos la funcion header de php para redirigir al usuario a la pantalla index 
donde esta el login
Para hacer uso de la funcion header, es header("location: ruta_del_archivo") */
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
}
?>
<!-- Abrimos codigo php para incluir el archivo header para pintar el html base hasta el body -->
<?php include("../components/header_generic.php"); ?>
<!-- Abrimos codigo php para incluir el archivo navbar para pintar la barra de navegación  con su funcionalidad -->
<?php include("../components/navbar.php"); ?>
<div class="container mt-3">
    <div class="alert alert-success" role="alert">
        <!-- Mostramos un mensaje de bienvenida sacando el username y el rol del array asociativo $_SESSION -->
        Welcome <strong><?php echo $_SESSION["username"]; ?></strong> Role: <strong><?php echo $_SESSION["role"]; ?></strong>
    </div>
</div>
<!-- Abrimos codigo php para incluir el archivo footer para pintar el html base hasta el body cuando cierra -->
<?php include("../components/footer_generic.php"); ?>