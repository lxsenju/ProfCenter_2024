<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css" type="text/css">
    <link rel="stylesheet" href="style/header-footer.css" type="text/css">
    <script src="js/index.js" defer></script>
    <title>Админ</title>
</head>
<body>
<?php
require_once "header.php"
?>
<main class="main">
    <h1>Заказы</h1>
    <section class="section section--form">
        <div class="orders">
            <div class="orders__col"><p>Михаил Галустян</p></div>
            <div class="orders__col">
                <div>
                    <p>Тип услуги:</p>
                    <p>Юридический</p>
                </div>
                <div>
                    <p>Услуга:</p>
                    <p>Изменение устава</p>
                </div>
                <div>
                    <p>Цена:</p>
                    <p>1000 рублей</p>
                </div>
            </div>
            <div class="orders__col">
                <form>
                    <button type="submit">Одобрить</button>
                </form>
                <form>
                    <button type="submit">Отклонить</button>
                </form>
            </div>
        </div>
        <div class="orders">
            <div class="orders__col"><p>Михаил Галустян</p></div>
            <div class="orders__col">
                <div>
                    <p>Тип услуги:</p>
                    <p>Юридический</p>
                </div>
                <div>
                    <p>Услуга:</p>
                    <p>Изменение устава</p>
                </div>
                <div>
                    <p>Цена:</p>
                    <p>1000 рублей</p>
                </div>
            </div>
            <div class="orders__col">
                <form>
                    <button type="submit">Одобрить</button>
                </form>
                <form>
                    <button type="submit">Отклонить</button>
                </form>
            </div>
        </div>
        <div class="orders">
            <div class="orders__col"><p>Михаил Галустян</p></div>
            <div class="orders__col">
                <div>
                    <p>Тип услуги:</p>
                    <p>Юридический</p>
                </div>
                <div>
                    <p>Услуга:</p>
                    <p>Изменение устава</p>
                </div>
                <div>
                    <p>Цена:</p>
                    <p>1000 рублей</p>
                </div>
            </div>
            <div class="orders__col">
                <form>
                    <button type="submit">Одобрить</button>
                </form>
                <form>
                    <button type="submit">Отклонить</button>
                </form>
            </div>
        </div>
    </section>
</main>
<?php
require_once "footer.html";
?>
</body>
</html>