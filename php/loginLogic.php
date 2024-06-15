<?php

session_start();
require_once "db.php";

$login = $_POST["login"];
$password = $_POST["password"];

$query = "SELECT `ID_user`, `login`, `ID_user_status` FROM `user` WHERE `login`='" . $login . "'and `password`='" . $password . "'";
$res = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($res);

if ($user) {
    $userLogin = $user["login"];
    $userStatus = $user["ID_user_status"];
    $id_user = $user["ID_user"];

    $_SESSION["auth"] = true;
    $_SESSION["login"] = $userLogin;
    $_SESSION["id_user"] = $id_user;
    $_SESSION["userStatus"] = $userStatus;

    echo $userLogin . " " . $userStatus;

    if ($userStatus == "2") {
        header("location: ../admin.php");
    } else {
        header("location: ../index.php");
    }
} else {
    echo "ты инвалид";
}
