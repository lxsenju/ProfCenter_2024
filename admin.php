<?php
session_start();
include "./php/db.php"
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
    <?php
    $sql = "SELECT CONCAT(user.fname, ' ', user.lname) AS name, service_type.name AS service_type_name, service.name AS service_name, ordering.email
        FROM ordering
        JOIN user ON ordering.ID_user = user.ID_user 
        JOIN service ON ordering.ID_service = service.ID_service 
        JOIN service_type ON service.ID_service_type = service_type.ID_service_type
        ORDER BY ordering.ID_ordering_status;";
    $result = $connection->query($sql);
    while ($n = mysqli_fetch_array($result)) {
        echo '<div class="orders">';
            echo '<div class="orders__col"><p>'. $n['name'] .'</p></div>';
            echo '<div class="orders__col">';
                echo '<div>';
                    echo '<p>Тип услуги:</p>';
                    echo '<p>'. $n['service_type_name'] .'</p>';
                echo '</div>';
                echo '<div>';
                    echo '<p>Услуга:</p>';
                    echo '<p>'. $n['service_name'] .'</p>';
                echo '</div>';
                echo '<div>';
                    echo '<p>Почта:</p>';
                    echo '<p>'. $n['email'] .'</p>';
                echo '</div>';
            echo '</div>';
            echo '<div class="orders__col">';
                echo '<form><button type="submit">Одобрить</button></form>';
                echo '<form><button type="submit">Отклонить</button></form>';
            echo '</div>';
        echo '</div>';
    };
    $conn->close();
    ?>
    </section>
</main>
<?php
require_once "footer.html";
?>
</body>
</html>
