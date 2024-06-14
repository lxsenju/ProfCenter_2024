<?php
session_start();
require_once "php/db.php"
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
                    <?php
                    $query = "SELECT service.ID_service AS ID, service.name AS SERVICE, service.price AS SERVICEPRICE, service_type.name AS SERVICETYPE FROM `service` JOIN `service_type` ON service_type.ID_service_type = service.ID_service_type;";
                    $result = mysqli_query($connection, $query);
                    ?>
                    <select id="services" name="services">
                        <?php
                        while ($service = mysqli_fetch_array($result)) {
                            echo
                                "
                            <option value='" . $service['ID'] . "'>" . $service['SERVICE'] . "</option>
                        ";
                        }
                        ?>
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