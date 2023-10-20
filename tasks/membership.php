<?php
require_once("../../Angeles/connection/DBConnection.php");
if (isset($_POST['busqueda'])) {
    // Recibe la búsqueda desde la solicitud Ajax
    $busqueda = $_POST['busqueda'];
    $connection = new PDODatabaseConnection("localhost", "bikcode", "12345", "Angeles");
    $request = $connection->getConnection()->prepare("SELECT ms.description, ms.status FROM student st INNER JOIN membership ms ON st.membership_id = ms.id WHERE st.id = :studentId LIMIT 1");
    $request->execute(['studentId' => $busqueda]);
    $data = $request->fetchAll();
    if (sizeof($data) != 0) {
        echo json_encode(['description' => $data[0]["description"], "status" => $data[0]["status"]]);
    } else {
        echo json_encode(["error" => "Not found"]);
    }
} else {
    // Si no se recibió 'busqueda' a través de POST, envía un mensaje de error
    echo json_encode(['error' => 'No se ha recibido ninguna búsqueda.']);
}
