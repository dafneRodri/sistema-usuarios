<?php include("conexion.php"); ?>
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
animation:bg 10s ease infinite;
font-family:Segoe UI;
color:white;
}
@keyframes bg{
0%{background-position:0% 50%;}
50%{background-position:100% 50%;}
100%{background-position:0% 50%;}
}
.box{
width:350px;
padding:30px;
border-radius:20px;
background:rgba(0,0,0,0.6);
backdrop-filter:blur(20px);
box-shadow:0 0 40px #7b5bf2;
animation:fade 1s ease;
}
@keyframes fade{
from{opacity:0; transform:translateY(20px);}
to{opacity:1;}
}
h2{
text-align:center;
color:#7b5bf2;
}
.sub{
text-align:center;
color:#aaa;
}
input{
width:100%;
padding:12px;
margin:10px 0;
border:none;
border-radius:12px;
background:#111;
color:white;
transition:0.3s;
}
input:focus{
outline:none;
box-shadow:0 0 15px #7b5bf2;
transform:scale(1.03);
}
/* BOTONES TIPO APP */
button{
width:100%;
padding:12px;
margin-top:10px;
border:none;
border-radius:12px;
background:linear-gradient(45deg,#7b5bf2,#09184d);
color:white;
font-weight:bold;
letter-spacing:1px;
transition:0.3s;
}
button:hover{
transform:translateY(-2px) scale(1.05);
box-shadow:0 0 25px #7b5bf2;
cursor:pointer;
}
a{
display:block;
text-align:center;
margin-top:10px;
color:#7b5bf2;
}
.msg{
text-align:center;
margin-top:10px;
color:#7b5bf2;
}
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
<input name="nombre" placeholder=" Nombre" required>👤
<input name="correo" type="email" placeholder=" Correo" required>📧
<input id="pass" name="password" type="password" placeholder=" Contraseña" required>🔒
<input name="password2" type="password" placeholder=" Confirmar contraseña" required>🔒
<input name="rol" placeholder=" Rol (admin/user)" required>
<button type="button" onclick="ver()"> Mostrar</button>👁️
<button type="submit">Registrar</button>
</form>
<a href="login.php">Ya tengo cuenta</a>
<?php
if($_POST){
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$pass=$_POST['password'];
$pass2=$_POST['password2'];
$rol=$_POST['rol'];
if($pass!=$pass2){
echo "<p class='msg'> No coinciden</p>";❌
}else{
$stmt=$conn->prepare("INSERT INTO usuarios(nombre,correo,password,rol) VALUES(?,?,?,?)");
$stmt->bind_param("ssss",$nombre,$correo,$pass,$rol);
$stmt->execute();
echo "<p class='msg'> Registrado</p>";✅
}
}
?>
</div>
</body>
</html>
nano panel.php
<?php
session_start();
include("conexion.php");
if(!isset($_SESSION['user'])) header("Location: login.php");
$r=$conn->query("SELECT * FROM usuarios");
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
margin:0;
background:#000;
color:white;
font-family:Segoe UI;
}
h1{
text-align:center;
color:#7b5bf2;
}
.container{
width:90%;
margin:auto;
}
.card{
background:#111;
padding:15px;
margin:10px;
border-radius:15px;
box-shadow:0 0 15px #7b5bf2;
display:flex;
justify-content:space-between;
align-items:center;
transition:0.3s;
}
.card:hover{
transform:scale(1.02);
}
.btn{
padding:8px 12px;
border-radius:10px;
text-decoration:none;
margin-left:5px;
background:#7b5bf2;
color:white;
}
.btn:hover{
box-shadow:0 0 10px #7b5bf2;
}
</style>
</head>
<body>
<h1> Panel</h1>
<div class="container">
<?php while($row=$r->fetch_assoc()){ ?>
<div class="card">
<div>
<b><?= $row['nombre'] ?></b><br>
<?= $row['correo'] ?>
</div>
<div>
<a class="btn" href="editar.php?id=<?= $row['id'] ?>"> </a>✏️
<a class="btn" href="eliminar.php?id=<?= $row['id'] ?>"> </a>🗑️
</div>
</div>
<?php } ?>
</div>
<br>
<center><a class="btn" href="logout.php">Cerrar sesión</a></center>
</body>
</html>
