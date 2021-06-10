<?php 
session_start();
include("db.php");
if($_POST){
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$_SESSION['usuario'] = $usuario;

$sql = "SELECT * FROM user WHERE user = '$usuario' AND password ='$password'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) == 1) {
  $usuario= mysqli_fetch_assoc($result);
 
  header("Location:index.php");
}else{
  $_SESSION['error-login'] = "Usuario o Password Incorrecto";
  header("Location:login.php");
  die();
  }
}
?> 