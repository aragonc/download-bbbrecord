<?php 
session_start(); 
require_once 'main/db.php';
$db = new db();
 if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
  }

if(isset($_POST['generate-category'])){

    $nameCategory = $_POST['new-category'];
    
    $result = $db->query("INSERT INTO category(nameCategory) VALUES (?)",[$nameCategory]);
    if(!$result){
        die("query failed");
    }
    
    $_SESSION['message'] = "Archivo guardado satisfactoriamente";
    $_SESSION['message_type'] = "success";
    header("Location: index-category.php");
}
