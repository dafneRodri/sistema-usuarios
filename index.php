<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

$mensaje = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass   = $_POST['password'];
    $pass2  = $_POST['password2'];
    $rol    = $_POST['rol'];

    if($pass != $pass2){
        $mensaje = "No coinciden ❌";
    } else {

        $stmt = $conn->prepare("INSERT INTO usuarios(nombre,correo,password,rol) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss",$nombre,$correo,$pass,$rol);
        $stmt->execute();

        $mensaje = "Registrado ✅";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registro</title>

<style>
body{
margin:0;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(-45deg,#000,#09184d,#000,#7b5bf2);
background-size:400% 400%;
animation:bg 10s infinite;
font-family:Segoe UI;
color:white;
}

@keyframes bg{
0%{background-position:0%}
50%{background-position:100%}
100%{background-position:0%}
}

.box{
width:350px;
padding:30px;
border-radius:20px;
background:rgba(0,0,0,0.6);
backdrop-filter:blur(20px);
box-shadow:0 0 40px #7b5bf2;
text-align:center;
}

.sub{
font-size:14px;
color:#aaa;
margin-bottom:20px;
}

input{
width:100%;
padding:12px;
margin:10px 0;
border:none;
border-radius:12px;
background:#111;
color:white;
outline:none;
transition:0.3s;
}

input:focus{
box-shadow:0 0 10px #7b5bf2;
}

button{
width:100%;
padding:12px;
border:none;
border-radius:12px;
background:linear-gradient(45deg,#7b5bf2,#09184d);
color:white;
cursor:pointer;
transition:0.3s;
}

button:hover{
box-shadow:0 0 15px #7b5bf2;
}

a{
display:block;
margin-top:15px;
color:#7b5bf2;
text-decoration:none;
}

.msg{
margin-top:10px;
}
</style>

</head>

<body>

<div class="box">

<h2> Crear cuenta </h2>
<p class="sub">Sistema de usuarios</p>

<form method="POST">

<input name="nombre" placeholder="👤 Nombre Completo" required>
<input name="correo" type="email" placeholder="📧 Correo Electrónico" required>

<input id="pass" name="password" type="password" placeholder="🔒 Contraseña" required>

<!-- 👁️ BOTÓN MOSTRAR -->
<button type="button" onclick="ver()">👁️ Mostrar</button>

<input name="password2" type="password" placeholder="🔒 Confirmar Contraseña" required>

<input name="rol" placeholder="Rol (admin / user)" required>

<button type="submit">Registrarme</button>

</form>

<!-- MENSAJE -->
<?php if($mensaje != ""): ?>
<p class="msg"><?= $mensaje ?></p>
<?php endif; ?>

<a href="login.php">Ya Tengo Cuenta 🔐</a>

</div>

<!-- SCRIPT -->
<script>
function ver(){
let x=document.getElementById("pass");
x.type=x.type==="password"?"text":"password";
}
</script>

</body>
</html>
