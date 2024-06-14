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
    <title>Войти</title>
</head>
<body>
<?php
require_once "header.php"
?>
<main class="main">
    <h1>Авторизоваться</h1>
    <section class="section section--form p-10">
        <div class="section__left">
            <form action="php/loginLogic.php" method="post">
                <label for="login"></label>
                <input id="login" name="login" type="text" placeholder="Логин">
                <label for="password"></label>
                <input id="password" name="password" type="password" placeholder="Пароль">
                <button type="submit">Войти</button>
            </form>
            <p>Ещё не зарегистрированы? <a href="registration.php">Зарегистрироваться</a></p>
        </div>
    </section>
</main>
<?php
require_once "footer.html";
?>
</body>
</html>