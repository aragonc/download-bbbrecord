
<?php
session_start();
require_once 'main/db.php';
$db = new db();

if(isset($_GET['id_category'])) {
  $idCategory = $_GET['id_category'];
  $result = $db->query("DELETE FROM category WHERE id_category = ?",[$idCategory]);
 
  
  $_SESSION['message'] = 'Archivo Eliminado satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index-category.php');

    if(!$result) {  
    $_SESSION['message'] = 'No se puede Eliminar esta en uso';
    $_SESSION['message_type'] = 'danger';

  }
}


?>