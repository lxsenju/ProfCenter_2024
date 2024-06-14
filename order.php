<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/index.css" type="text/css">
    <link rel="stylesheet" href="style/header-footer.css" type="text/css">
    <script src="js/index.js" defer></script>
    <title>Заказ</title>
</head>
<body>
<?php
require_once "header.php"
?>
<main class="main">
    <h1>Оформить заказ</h1>
    <section class="section p-10">
        <div class="section__left">
            <form>
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="Введите ваш email" required>
                <label for="phone"></label>
                <input type="tel" id="phone" name="phone" placeholder="Введите вашу почту" required>
                <label for="services"></label>
                <select id="services" name="services">
                    <option value="1">Регистрация (ООО, ИП)</option>
                    <option value="2">Изменение устава</option>
                    <option value="3">Разрешение споров(трудовые, экономические)</option>
                    <option value="4">Лицензии</option>
                    <option value="5">Ликвидация</option>
                    <option value="6">Консалтинг</option>
                    <option value="7">Смена юридического адреса</option>
                    <option value="8">Изменение видов деятельности</option>
                </select>
                <button type="submit">Оформить заказ</button>
            </form>
        </div>
    </section>
</main>
<?php
require_once "footer.html";
?>
</body>
</html>