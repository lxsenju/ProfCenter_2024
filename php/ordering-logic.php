<?php
session_start();
require_once "db.php";


// Продолжение вашей логики для обработки заказов

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $id_service = $_POST['services'];
    $ID_user = $_SESSION['ID_user'];


    $sql = "CALL InsertOrder('$email', '$id_service', '$ID_user', '1');";

    if ($connection->query($sql) === TRUE) {
        if ($connection->affected_rows > 0) {
            header("Location: ../admin-shift.php");
        }
    } else {
        echo "Добавления " . $connection->error;
    }

    $connection->close();
} else {
    echo "Ты инвалид";
}
?>