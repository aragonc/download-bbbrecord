
<?php

include("db.php");

if(isset($_GET['idVideo'])) {
  $idVideo = $_GET['idVideo'];
  $query = "DELETE FROM videos WHERE idVideo = $idVideo";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Archivo Eliminado satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>