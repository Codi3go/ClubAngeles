<?php
/** Inicializo el objeto de session, para poder hacer uso de las sessiones */
session_start();
/** 
 * Incluyo el archivo de la conexion a la base de datos para poder usarla
*/
require("../connection/DBConnection.php");
require("../connection/DataConnection.php");
/** Creo una instancia de la clase PDODatabaseConnection, pasandole por el constructor los datos que necesita
 * y dicha instancia la almanceno en la variable connection
 */
    $connection = new PDODatabaseConnection(DataConnection::$host, DataConnection::$username, DataConnection::$password, DataConnection::$db);
    /** Valido que si lo las variables EMAIL Y PASSWORD que viene dentro del array POST ninguna de las 2 sea vacio  */
    if($_POST["email"] != "" && $_POST["password"] != "") {
        /**Si ninguna es vacia, entonces entra al IF */
        /** Aquí esto se divide en 3 partes
         * 
         * Como tengo la instancia de la PDODatabaseConnection en la variable connection, invoco a la función getConnection, para obtener la instancia
         * de la base de datos, de allí invoco a la funcion prepare, la cual como dice, prepara la consulta que necesitamos ejecutar
         * 
         * La funcion prepare retorna un Statement, entonces eso lo almacenamos en la variable statement que hemos creado a su vez
         * 
         * En mysql cuando tienes una tabla, le puedes dar un alias, para evitar escribir nombres tan largos de algunas tablas
         * por ende puedes ver en la consulta que esta user us role ro, las referencias serian us y ro
         * de la consulta solicito: el nombre del usuario, la description del rol y tambien al campo que va a retornar la consulta le puedo dar un alias
         * en este caso, en vez de que me retorne description para el rol, le digo que me retorne roleDescription entonces así sé a que tabla pertenece dicha informacion
         * el inner join es para unir 2 tablas y poder obtener la informacion de ambas o de las n que se necesite
         * 
         * en la consulta puedes ver la clausula WHERE que es para filtrar datos exactos, ando buscando por email y password y como tiene el AND es obligatorio que para 
         * que la consulta sea exitosa, ambos valores deben coincidir, esta :email y :password, están asi por que son variables de referencia en la consulta
         * PDO -> PHP DATA OBJECT
         */
        $statement = $connection->getConnection()->prepare("SELECT us.email, ro.description as roleDescription FROM user us INNER JOIN role ro ON us.role_id = ro.id WHERE email = :email AND password = :password LIMIT 1");
        /** usando la variable statement, ejecutamos la consulta previamente preparada, al momento de invocar el execute
         * le estamos pasando un array asociativo de clave valor, esto practicamente es decirle, de las variables que tienes en la preparacion
         * estos son sus valores, ejecuta la consulta pero donde estan las variables aqui te paso sus valores
         * 
         */
        $statement->execute(['email' => $_POST["email"], 'password' => $_POST["password"]]);
        /** despues de ejecutar la consulta, invocamos a fetchAll que lo que hace es retornar un array con toda la informacion solicitada en la consulta
         * y dicho array lo almacenamos en la variable data
         */
        $data = $statement->fetchAll();

        //["email" => "bikcodeh@gmail.com", "roleDescription" => "admin"]
        //[]
        /** nos aseguramos de que la consulta si haya arrojado registros y como data es un array, si hay datos, al menos 1, entonces el tamaño del array
         * será 1, si es 0 es porque la consulta no encontró nada
         * 
         * entonces sizeof nos arroja en un numero el tamaño del array y se valida que si es diferente de 0, entonces haga lo que esta dentro del bloque if que es
         * cuando sí encontró datos
         */
        if (sizeof($data) != 0) {
            /** como si encontró los datos del usuario que se esta intentando loggear en el sistema,
             * entonces creamos una variable de session llamada username y otra llamada role y les asignamos sus valores
             * usamos $data[0]["email] por que data es un array, entonces $data[0] accedemos al primer elemento del array
             * y le anexamos $data[0]["email"] para que de ese primer elemento, obtenga la propiedad email
             * 
             * y asi exactamente pero para el campo roleDescription
             * 
             * Y podemos acceder a los campos email y roleDescription porque fue lo que pedimos de la base de datos
             */
            $_SESSION["username"] = $data[0]["email"];
            $_SESSION["role"] = $data[0]["roleDescription"];
            /** Despues de hacer lo que necesitabamos con la base de datos, si no haremos nada mas, cerramos la conexion
             * invocando la funcion closeConnection()
             */
            $connection->closeConnection();
            /**Como todo salió bien, por ultimo redireccionamos al usuario a la pagina de bienvenida */
            header("Location: ../pages/welcome.php");
        } else {
            /** Se entra en el bloque ELSE cuando el array de datos de la consulta es 0, por ende no encontró en la base de datos
             * nada que coincida con el email y la password ingresados
            */

            /** Creamos una variable de session login_invalid y le agregamos un mensaje de error */
           $_SESSION["login_invalid"] = "Credentials Invalid, check your information"; 
           /** Por ultimo redireccionamos  al usuario nuevamente a la pagina del index, o sea donde esta el login*/
           header("Location: ../index.php");
        }
    } else {
        /** Se entra en este ELSE si por algun motivo llegase a llegar a este archivo 
         * y tanto el email y el password estan vacios
        */
        /** entonces Creamos tambien una variable de session login_invalid y le agregamos un mensaje de error */
        $_SESSION["login_invalid"] = "Credentials Invalid, check your information"; 
        /** y tambien redireccionamos  al usuario nuevamente a la pagina del index, o sea donde esta el login para que ingrese bien las credenciales*/
        header("Location: ../index.php");
    }
?>