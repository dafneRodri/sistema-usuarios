<?php
session_start();
include("conexion.php");
if($_POST){
$correo=$_POST['correo'];
$pass=$_POST['password'];
$stmt=$conn->prepare("SELECT * FROM usuarios WHERE correo=?");
$stmt->bind_param("s",$correo);
$stmt->execute();
$r=$stmt->get_result();
if($r->num_rows>0){
$user=$r->fetch_assoc();
if($pass == $user['password']){
$_SESSION['user']=$user['correo'];
$_SESSION['nombre'] = $user['nombre'];
$_SESSION['rol'] = $user['rol'];
header("Location: panel.php");
}else{
$mensaje = "Contraseña incorrecta ❌";
}
}else{
$mensaje = "Usuario no existe ❌";
}
}
?>

<!DOCTYPE html>
<html>
<head>
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

input{
width:100%;
padding:12px;
margin:10px 0;
border:none;
border-radius:12px;
background:#111;
color:white;
}

button{
width:100%;
padding:12px;
margin-top:10px;
border:none;
border-radius:12px;
background:linear-gradient(45deg,#7b5bf2,#09184d);
color:white;
cursor:pointer;
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
color:red;
margin-top:10px;
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
<h2> Login 🔐</h2>
<form method="POST">
<input name="correo" placeholder="Correo" required>
<input id="pass" name="password" type="password" placeholder="Contraseña" required>
<button type="button" onclick="ver()">👁️ Mostrar contraseña</button>
<button type="submit">Entrar</button>
</form>
<?php if(isset($mensaje)) echo "<p class='msg'>$mensaje</p>"; ?>
        
<a href="index.php">Crear cuenta</a>
</div>
</body>
</html>

