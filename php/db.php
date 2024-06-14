<?php

$connection = new mysqli("localhost", "root", "", "profcenter");

if ($connection->connect_error) {
    echo "Connection failed: " . $connection->connect_error;
} else {
    echo "норм";
}

?>

