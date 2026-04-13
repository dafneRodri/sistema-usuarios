<?php
$conn = new mysqli("localhost", "appuser", "1234", "app_db");
if ($conn->connect_error) {
die("Error conexión");
}
?>
