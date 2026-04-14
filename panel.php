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
margin-top:20px;
}

.container{
width:90%;
margin:auto;
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
}

.card{
background:rgba(255,255,255,0.05);
padding:20px;
border-radius:20px;
box-shadow:0 0 15px #7b5bf2;
transition:0.3s;
}

.card:hover{
transform:scale(1.03);
}

.btn-group{
margin-top:10px;
display:flex;
gap:10px;
}

.btn{
flex:1;
text-align:center;
padding:8px;
border-radius:10px;
text-decoration:none;
background:linear-gradient(45deg,#7b5bf2,#09184d);
color:white;
}

.btn:hover{
box-shadow:0 0 10px #7b5bf2;
}

.logout{
display:block;
margin:30px auto;
width:200px;
text-align:center;
padding:10px;
border-radius:10px;
background:#7b5bf2;
text-decoration:none;
color:white;
}
</style>
</head>
<body>
<h1> Panel</h1>
<div class="container">
<?php while($row=$r->fetch_assoc()){ ?>
<div class="card">
<div>
<b><?= $row['nombre'] ?></b> <small style="color:#7b5bf2;">(<?= $row['rol'] ?>)</small><br>
<?= $row['correo'] ?>
</div>
<div class="btn-group">
<a class="btn" href="editar.php?id=<?= $row['id'] ?>"> Editar ✏️</a>
<a class="btn" href="eliminar.php?id=<?= $row['id'] ?>"> Borrar 🗑️</a>
</div>
</div>
<?php } ?>
</div>
<br>
<a class="logout" href="logout.php">Cerrar sesión 🔒</a>
</body>
</html>
