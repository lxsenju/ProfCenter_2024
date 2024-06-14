<?php

include "db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $setStatus = $_POST['order_status'];
    $idOrder = $_POST['id_order'];

    if ($setStatus == "2" || $setStatus == "3") {
        echo $setStatus;
        echo $idOrder;
        $sql = "
UPDATE `ordering` 
SET `ID_ordering_status`='" . $setStatus . "' 
WHERE `ID_ordering`='" . $idOrder . "'
";
        $connection->query($sql);
        header("Location: ../admin.php");
    }
} else {
    echo "Ты инвалид";
}
?>
