<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $id_service = $_POST['services'];
    $id_user = $_SESSION['id_user'];


    $sql = "CALL InsertOrder('$email', '$id_service', '$id_user', '1');";

    if ($connection->query($sql) === TRUE) {
        if ($connection->affected_rows > 0) {
            header("Location: ../index.php");
        }
    } else {
        echo "Добавления " . $connection->error;
    }

    $connection->close();
} else {
    echo "Ты инвалид";
}
?>