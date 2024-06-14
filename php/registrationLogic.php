<?php
session_start();
require_once "db.php";

$userName = $_POST["userName"];
$userSurname = $_POST["userSurname"];
$login = $_POST["login"];
$password = $_POST["password"];

if (empty($login) || empty($password) || empty($userName) || empty($userSurname)) {
    echo "ты инвалид?";
} else {
    $query = "SELECT * FROM `user` WHERE login ='" . $login . "'";
    $res = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($res);
    if ($user) {
        echo "Такой инвалид уже есть";
    } else {
        $query = "INSERT INTO `user`(`fname`, `lname`, `login`, `password`) 
            VALUES ('" . $userSurname . "','" . $userName . "','" . $login . "','" . $password . "')";
        if ($connection->query($query)) {
            header("Location: ../login.php");
        } else {
            echo "Ошибка: " . $connection->error;
        };
    };

}
?>

