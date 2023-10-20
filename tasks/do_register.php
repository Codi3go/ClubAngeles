<?php
require_once("../../Angeles/connection/DBConnection.php");
$connection = new PDODatabaseConnection("localhost", "bikcode", "12345", "Angeles");
    if ($_POST["name"] != "" &&
        $_POST["email"] != "" &&
        $_POST["pass"] != "" 
    ) {
        $statement = $connection->getConnection()->prepare("INSERT INTO user (name, email, password, role_id) VALUES(:name, :email, :pass, 2)");
        $statement->bindParam(":name", $_POST["name"]);
        $statement->bindParam(":email", $_POST["email"]);
        $statement->bindParam(":pass", $_POST["pass"]);
        if ($statement->execute()) {
            $_SESSION["username"] = $_POST["name"];
            $_SESSION["role"] = "Student";
            if (isset($_POST["do_register"])) {
                $_SESSION["register_success"] = "Register successfully";
            } else {
                header("Location: ../pages/welcome.php");
            }
        } else {
            $_SESSION["invalid_login"] = "An error happened doing sign up, please try again.";
        }
    }
?>
