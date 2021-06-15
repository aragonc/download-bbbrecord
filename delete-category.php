
<?php
session_start();
include("db.php");

if(isset($_GET['id_category'])) {
  $idCategory = $_GET['id_category'];
  $query = "DELETE FROM category WHERE id_category = $idCategory";
  $result = mysqli_query($conn, $query);
  
  $_SESSION['message'] = 'Archivo Eliminado satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index-category.php');

    if(!$result) {  
    $_SESSION['message'] = 'No se puede Eliminar esta en uso';
    $_SESSION['message_type'] = 'danger';

  }
}


?>