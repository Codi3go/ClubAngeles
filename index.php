<!-- Hola este comenrario es de prueba
    Iniciamos el uso de sessiones, esto para hacer uso de las mismas desde el primer momento que se inicia la aplicación

    Como la pantalla de entrada es el login, tenemos un cuerpo html especifico para el login, pues estamos agregando los estilos del login, que solo
    seran de uso en esta pantalla, no los necesitamos en otras y agregamos los css y js necesarios para que funcione
-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/background_style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../../Angeles/js/login.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../Angeles/styles/login_style.css" type="text/css" />
    <title>Angeles</title>
</head>

<body>
    <div>
        <!-- Abrimos etiquetas PHP para poder escribir codigo php
                
            Validamos si existe dentro del array asociativo $_SESSION el key login_invalid, entonces si dicho key existe
            se procede a mostrar lo que esta dentro del bloque if. Se puede apreciar que el if abre la llave { y cierra el codigo php con ?>
            Esto se hace, para que acto seguido se muestre en pantalla el codigo html, o sea lo que seria el div con la class alert y de mas  -->
        <?php if (isset($_SESSION["login_invalid"])) { ?>
            <!-- El div que contiene lo del alert, todo es codigo de bootstrap, buscar alerts en bootstrap para que miren y comparen -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <!-- Nuevamente abrimos codigo php en este caso para imprimir lo que contiene el array asociativo con el key login_invalid - Recordar que el valor que se le asigna a dicho key
                    Se hace en el archivo do_login.php -->
                <?php echo $_SESSION["login_invalid"]; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- Despues de mostrar el mensaje de error, usamos la función unset de php para eliminar el key login_invalid del array asociativo $_SESSION 
                Esto se hace, porque despues de mostrado el mensaje, no queremos que se muestre mas, hasta un nuevo intento de login-->
        <?php unset($_SESSION["login_invalid"]);
        } ?>
        <!--  Fuera del if de validar si existe login_invalid creamos otro if, esta vez preguntando si existe el key username dentro del array asociativo $_SESSION
            Si dicho key existe, es porque el usuario ya inició sesión, entonces usamos la funcion header de php para redirigir al usuario a la pantalla de welcome y que
            no vea la pantalla de login
            Para hacer uso de la funcion header, es header("location: ruta_del_archivo") -->
        <?php if (isset($_SESSION["username"])) {
            header("Location: ../../Angeles/pages/welcome.php");
        } ?>
        <!-- Las clases que suelen tener los divs y de mas, suelen ser de bootstrap, muy pocas en particular son custom en el sentido de creadas por mi -->
        <div class="container" id="container">

            <div class="form-container">
                <!-- Creamos el formulario, en el action ponemos el archivo, la ruta, del archivo que queremos que se ejecuta al momento de
                    enviar el formulario, en el method ponemos POST porque estamos enviando datos-->
                <form action="../../Angeles/tasks/do_login.php" method="POST">
                    <h1>Sign in</h1>
                    <!-- A los inputs, le tenemos que poner el atributo name y darle un identificador claro y conciso, pues con ese name es el que luego vamos a obtener la informacion 
                     Ya sea del array asociativo $_POST o $_GET cuando al method del form es GET -->
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <a href="#">Forgot your password?</a>
                    <!-- Para que el formulario se envie y ejecute, el boton debe ser tipo submit -->
                    <button type="submit">Sign In</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Leer sobre el array asociativo $_POST, $_GET $_SESSION de php-->
    <!-- Leer sobre las funciones isset, unset, session_start, header de php-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>