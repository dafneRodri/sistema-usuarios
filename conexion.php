<?php
$conn = new mysqli("localhost", "root", "", "app_db");
if ($conn->connect_error) {
    die("Error conexión: " . $conn->connect_error);
}
?>
