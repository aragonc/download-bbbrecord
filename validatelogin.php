<?php 
include("db.php");
session_start();

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$_SESSION['usuario'] = $usuario;

$sql = "SELECT * FROM user WHERE user = '$usuario' AND password ='$password'";

$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
  header('location:index.php');  
}else{
    echo"<script>alert('Usuario o Clave Incorrecto.');window.location='login.php';</script>";
  }
?>