<?php
session_start();
include "./action/connect.php"
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
<header class="header">

    <div class="hamburger">
        <div class="hamburger_lines" id="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>

    <nav class="popup" id="popup">
        <ul class="header_nav-popup">
            <li><a href="">О нас</a></li>
            <li><a href="">Услуги</a></li>
            <li><a href="">Оформить заказ</a></li>
            <li><a href="">Отзывы</a></li>
            <li><a href="">Авторизация</a></li>
        </ul>
    </nav>

    <img src="img/logo.png" alt="logo">
    <nav class="header__nav">
        <ul>
            <li><a href="">О нас</a></li>
            <li><a href="">Услуги</a></li>
            <li><a href="">Оформить заказ</a></li>
            <li><a href="">Отзывы</a></li>
            <li><a href="">Авторизация</a></li>
        </ul>
    </nav>
</header>
<main class="main">
    <h1>Заказы</h1>
    <?php
    $sql = "SELECT user.fname, user.lname AS name, service_type.name AS service_type_name, service.name AS service_name, ordering.email 
        FROM ordering
        JOIN user ON ordering.ID_user = user.ID_user 
        JOIN service ON ordering.ID_service = service.ID_service 
        JOIN service_type ON service.ID_service_type = service_type.ID_service_type
        ORDER BY ordering.ID_ordering_status;";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        die("Error executing query: " . $conn->error . " - Query: " . $sql);
    }
    ?>
    <section class="section section--form">
        <div class="orders">
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="orders__col"><p><?php echo $row['name']; ?></p></div>
                    <div class="orders__col">
                        <div>
                            <p>Тип услуги:</p>
                            <p><?php echo $row['service_type_name']; ?></p>
                        </div>
                        <div>
                            <p>Услуга:</p>
                            <p><?php echo $row['service_name']; ?></p>
                        </div>
                        <div>
                            <p>Почта:</p>
                            <p><?php echo $row['email']; ?></p>
                        </div>
                    </div>
                    <div class="orders__col">
                        <form><button type="button">Одобрить</button></form>
                        <form><button type="button">Отклонить</button></form>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>Записи не найдены</p>
            <?php } ?>
        </div>

        <?php
        $result->free();
        $conn->close();
        ?>
    </section>
</main>
<footer class="footer">
    <nav class="footer__nav">
        <ul>
            <li>+7 (996) 455-00-28</li>
            <li><a>profcenter22@mail.ru</a></li>
            <li><a>profsenter@yandex.ru</a></li>
            <li>© ProfCenter, 2024</li>
            <li></li>
        </ul>
        <ul>
            <li><a>О нас</a></li>
            <li><a>Услуги</a></li>
            <li><a>Оформить заказ</a></li>
            <li><a>Отзывы</a></li>
            <li><a>Авторизация</a></li>
        </ul>
    </nav>
</footer>
</body>
</html>