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
    <link rel="stylesheet" href="style/addition.css" type="text/css">
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
    $sql = "SELECT CONCAT(user.fname, ' ', user.lname) AS name, service_type.name AS service_type_name, service.name AS service_name, ordering_status.name AS ordering_status_name, ordering_status.ID_ordering_status AS ID_ordering_status, ordering.email, ordering.ID_ordering AS ID_ordering
        FROM ordering
        JOIN user ON ordering.ID_user = user.ID_user 
        JOIN service ON ordering.ID_service = service.ID_service 
        JOIN ordering_status ON ordering.ID_ordering_status = ordering_status.ID_ordering_status
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
            if ($n['ID_ordering_status'] == '1') {
                echo "<form method='post' action='php/set_status-order.php'>
                      <label class='none'><input name='id_order' type='text' value='" . $n['ID_ordering'] . "'></label>
                        <button name='order_status' value='2' type='submit'>Одобрить</button>
                      </form>

                      <form method='post' action='php/set_status-order.php'>  
                       <label class='none'><input name='id_order' type='text' value='" . $n['ID_ordering'] . "'></label>
                        <button name='order_status' value='3' type='submit'>Отклонить</button>
                      </form>";
            }
            else {
                echo $n['ordering_status_name'];
        }
            echo '</div>';
        echo '</div>';
    };
    $connection->close();
    ?>
    </section>
</main>
<?php
require_once "footer.html";
?>
</body>
</html>
