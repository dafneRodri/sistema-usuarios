<?php
include("conexion.php");

// Verificar que exista el ID
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

// Si se envió el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    // Consulta segura
    $stmt = $conn->prepare("UPDATE usuarios SET nombre=?, correo=? WHERE id=?");
    $stmt->bind_param("ssi", $nombre, $correo, $id);
    $stmt->execute();

    header("Location: panel.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar usuario</title>
</head>
<body>

<h2>Editar usuario</h2>

<form method="POST">
<input name="nombre" placeholder="Nombre" required>
<input name="correo" type="email" placeholder="Correo" required>
<button type="submit">Guardar cambios</button>
</form>

</body>
</html>
