<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/index.css" type="text/css">
    <link rel="stylesheet" href="style/header-footer.css" type="text/css">
    <script src="js/index.js" defer></script>
    <title>Регистрация</title>
</head>
<body>
<?php
require_once "header.php"
?>
<main class="main">
    <h1>Зарегистрироваться</h1>
    <section class="section section--form p-10">
        <div class="section__left">
            <form action="php/registrationLogic.php" method="post">
                <label for="userName"></label>
                <input id="userName" name="userName" type="text" placeholder="Имя">
                <label for="userSurname"></label>
                <input id="userSurname" name="userSurname" type="text" placeholder="Фамилия">
                <label for="login"></label>
                <input id="login" name="login" type="text" placeholder="Логин">
                <label for="password"></label>
                <input id="password" name="password" type="password" placeholder="Пароль">
                <button type="submit">Войти</button>
            </form>
            <p>Уже зарегистрированы? <a href="login.php">Авторизоваться</a></p>
        </div>
    </section>
</main>
<?php
require_once "footer.html";
?>
</body>
</html>