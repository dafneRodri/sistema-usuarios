<?php
include("conexion.php");
$conn->query("DELETE FROM usuarios WHERE id=$_GET[id]");
header("Location: panel.php");
?>
