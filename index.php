<?php
session_start();
include "php/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/index.css" type="text/css">
    <link rel="stylesheet" href="style/header-footer.css" type="text/css">
    <script src="js/index.js" defer></script>
    <title>ProfCenter</title>
</head>
<body>
<?php
require_once "header.php"
?>
<main class="main">
    <section class="section">
        <div class="section__left">
            <h1 id="about">НАШИ ПРЕИМУЩЕСТВА</h1>
            <ul class="ul--big">
                <li><img src="img/checkcircle.svg" alt="icon">Гарантия качества</li>
                <li><img src="img/checkcircle.svg" alt="icon">Всегда на связи</li>
                <li><img src="img/checkcircle.svg" alt="icon">Полный комплекс услуг</li>
                <li><img src="img/checkcircle.svg" alt="icon">Квалификация и опыт</li>
                <li><img src="img/checkcircle.svg" alt="icon">Надежность</li>
            </ul>
        </div>
        <div class="section__right">
            <img src="img/cat.png" alt="cat" class="cat-img">
        </div>
    </section>
    <section class="section" id="service">
        <div class="section__left">
            <?php /*
            $query = "SELECT service.ID_service AS ID, service.name AS SERVICE, service.price AS SERVICEPRICE, service_type.name AS SERVICETYPE FROM `service` JOIN `service_type` ON service_type.ID_service_type = service.ID_service_type;";
            $result = mysqli_query($connection, $query);
            $current_category = "";

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row["SERVICETYPE"] != $current_category) {
                        echo "<h1>" . $row["SERVICETYPE"] . "</h1>";
                        $current_category = $row["SERVICETYPE"];
                    }
                    echo
                        "
                            <p>" . $row["SERVICE"] . " - " . $row["SERVICEPRICE"] . "₽</p>
                            
                            <table class='table'>
                                <tbody>
                                    <tr>
                                        <td>" . $row["SERVICE"] . "</td>
                                        <td>" . $row["SERVICEPRICE"] . "₽</td>
                                    </tr>
                                </tbody>
                            </table>
                        ";
                }
            } else {
                echo "0 results";
            }

            $connection->close();*/
            ?>

            <?php
            $query = "SELECT service.ID_service AS ID, service.name AS SERVICE, service.price AS SERVICEPRICE, service_type.name AS SERVICETYPE FROM `service` JOIN `service_type` ON service_type.ID_service_type = service.ID_service_type;";
            $result = mysqli_query($connection, $query);

            $currentCategory = "";
            ?>

            <table>
                <?php while ($service = mysqli_fetch_assoc($result)): ?>
                    <?php if ($currentCategory != $service['SERVICETYPE']): ?>
                        <?php $currentCategory = $service['SERVICETYPE']; ?>
                        <tr>
                            <th colspan="2"><h1><?= $currentCategory ?></h1></th>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td><?= $service['SERVICE'] ?></td>
                        <td><?= $service['SERVICEPRICE'] ?> руб.</td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>

    </section>
    <section class="section">
        <div class="section__left">
            <h1 id="cta">ОФОРМИТЕ СВОЙ ЗАКАЗ УЖЕ СЕЙЧАС!</h1>
            <p class="p-r">Получите профессиональные бухгалтерские и юридические услуги. Наши эксперты помогут вам
                решить любые
                задачи быстро и качественно. Заполните заявку, и мы свяжемся с вами в кратчайшие сроки!</p>
            <p class="p-r">Не упустите возможность получить квалифицированную помощь — нажмите "Оформить заказ" и
                начните
                сотрудничество с нами уже сегодня!</p>
            <form action="order.php" method="get">
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
        <div class="section__right">
            <img src="img/client.png" alt="client" class="client-img">
        </div>
    </section>
    <section class="section">
        <div class="section__left">
            <h1 id="comment">ОТЗЫВЫ</h1>
            <div class="grope">
                <div class="comm">
                    <p>"Отличный выбор для бизнеса! Эффективное решение бухгалтерских и юридических вопросов.
                        Профессиональный подход и оперативность команды. Спасибо за качественное обслуживание!"</p>
                    <span class="author">Михаил Галустян <img src="img/author.svg" alt="author"
                                                              class="author-img"> </span>
                </div>
                <div class="comm">
                    <p>"Отличный сервис для бизнеса! Получили профессиональную помощь в вопросах бухгалтерии и
                        юриспруденции. Работают оперативно и внимательно к деталям. Рекомендую!"</p>
                    <span class="author">Алиса Галустян <img src="img/author.svg" alt="author"
                                                             class="author-img"></span>
                </div>
                <div class="comm">
                    <p>"Профессиональная помощь в самый нужный момент! Благодаря услугам этого сайта, наши бухгалтерские
                        и юридические вопросы решены быстро и эффективно. Очень довольны результатом!"</p>
                    <span class="author">Вячеслав Галустян <img src="img/author.svg" alt="author"
                                                                class="author-img"></span>
                </div>
                <div class="comm">
                    <p>"Прекрасный сервис и профессиональный подход! Все бухгалтерские и юридические вопросы решены
                        оперативно и без лишних проблем. Рекомендую всем, кто ищет надежного партнера для своего
                        бизнеса."</p>
                    <span class="author">Геннадий Галустян <img src="img/author.svg" alt="author"
                                                                class="author-img"></span>
                </div>
                <div class="comm">
                    <p>"Отличные специалисты! Бухгалтерские и юридические услуги были предоставлены быстро и
                        качественно. Вежливый персонал и внимательное отношение к клиентам. Очень довольны
                        результатом!"</p>
                    <span class="author">Анатолий Галустян <img src="img/author.svg" alt="author"
                                                                class="author-img"></span>
                </div>
                <div class="comm">
                    <p>"Великолепная команда профессионалов! Решили все наши бухгалтерские и юридические вопросы быстро
                        и эффективно. Очень довольны качеством услуг и вниманием к деталям. Теперь рекомендуем их всем
                        нашим партнерам!"
                    </p>
                    <span class="author">Ленка Коровкина <img src="img/author.svg" alt="author"
                                                              class="author-img"></span>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require_once "footer.html";
?>
</body>
</html>