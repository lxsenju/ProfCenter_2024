<?php

session_start();
require_once "db.php";

$login = $_POST["login"];
$password = $_POST["password"];

$query = "SELECT `login`, `ID_user_status` FROM `user` WHERE `login`='" . $login . "'and `password`='" . $password . "'";
$res = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($res);

if ($user) {
    $userLogin = $user["login"];
    $userStatus = $user["ID_user_status"];

    $_SESSION["auth"] = true;
    $_SESSION["login"] = $userLogin;
    $_SESSION["userStatus"] = $userStatus;

    if ($userStatus = "2") {
        header("location: ../admin.php");
    } else {
        header("location: ../index.php");
    }
} else {
    echo "ты инвалид";
}
