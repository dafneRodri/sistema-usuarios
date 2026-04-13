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
