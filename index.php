<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

echo $_SERVER['REQUEST_METHOD'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registro</title>

<style>
</style>

<script>
function ver(){
let x=document.getElementById("pass");
x.type=x.type==="password"?"text":"password";
}
</script>

</head>

<body>

<div class="box">

<h2> Sistema de usuarios</h2>
<p class="sub">Crear cuenta</p>



<form method="POST">

<input name="nombre" placeholder="Nombre" required>
<input name="correo" type="email" placeholder="Correo" required>
<input name="password" type="password" placeholder="Contraseña" required>
<input name="password2" type="password" placeholder="Confirmar" required>
<input name="rol" placeholder="Rol" required>

<button type="submit">Registrar</button>

</form>

<a href="login.php">Ya tengo cuenta</a>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass   = $_POST['password'];
    $pass2  = $_POST['password2'];
    $rol    = $_POST['rol'];

    if($pass != $pass2){
        echo "<p class='msg'> No coinciden ❌</p>";
    } else {

        $stmt = $conn->prepare("INSERT INTO usuarios(nombre,correo,password,rol) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss",$nombre,$correo,$pass,$rol);
        $stmt->execute();

        echo "<p class='msg'> Registrado ✅</p>";
    }
}
?>

</div>

</body>
</html>
