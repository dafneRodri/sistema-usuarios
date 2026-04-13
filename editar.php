<?php
include("conexion.php");
$id=$_GET['id'];
if($_POST){
$conn->query("UPDATE usuarios SET nombre='$_POST[nombre]' WHERE id=$id");
header("Location: panel.php");
}
?>
