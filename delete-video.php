
<?php
session_start();
require_once 'main/db.php';
$db = new db();

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = $db->query("DELETE FROM video WHERE id = ?",[$id]);
  
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Archivo Eliminado satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>