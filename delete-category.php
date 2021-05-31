
<?php

include("db.php");

if(isset($_GET['idCat'])) {
  $idCat = $_GET['idCat'];
  $query = "DELETE FROM categoria WHERE idCat = $idCat";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Archivo Eliminado satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index-category.php');
}

?>