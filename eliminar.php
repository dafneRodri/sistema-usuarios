<?php
include("conexion.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Preparar consulta segura
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

}

// Redirigir
header("Location: panel.php");
exit;
?>
