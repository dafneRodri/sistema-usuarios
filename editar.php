<?php
include("conexion.php");

// Verificar ID
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Obtener datos actuales del usuario
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();
}

// Si se envió el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

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

<style>
body{
    background:#000;
    color:white;
    font-family:Segoe UI;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.box{
    background:#111;
    padding:30px;
    border-radius:15px;
    box-shadow:0 0 20px #7b5bf2;
    width:300px;
}
input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:none;
    border-radius:10px;
    background:#222;
    color:white;
}
button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:10px;
    background:#7b5bf2;
    color:white;
}
</style>

</head>
<body>

<div class="box">
<h2>Editar usuario</h2>

<form method="POST">

<input name="nombre" value="<?= $usuario['nombre'] ?>" required>
<input name="correo" type="email" value="<?= $usuario['correo'] ?>" required>

<button type="submit">Guardar cambios</button>

</form>

</div>

</body>
</html>
