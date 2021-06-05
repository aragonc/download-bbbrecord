
<?php

include("db.php");

if(isset($_GET['idCategory'])) {
  $idCategory = $_GET['idCategory'];
  $query = "DELETE FROM category WHERE idCategory = $idCategory";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Archivo Eliminado satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index-category.php');
}

?>