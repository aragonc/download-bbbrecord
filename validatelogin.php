<?php 
session_start();
require_once 'main/db.php';
$db = new db();

if($_POST){
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$_SESSION['usuario'] = $usuario;
$result = $db->query("SELECT * FROM user WHERE user=? AND password=? ",[$usuario,$password])->fetchAll();

if ($result) {
  header("Location:index.php");
}else{
  $_SESSION['error-login'] = "Usuario o Password Incorrecto";
  header("Location:login.php");
  die();
  }
  
}
?> 