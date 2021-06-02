
<?php
include("db.php");
$url = '';
$nombreCat = '';


if  (isset($_GET['idCat'])) {
  $idCat = $_GET['idCat'];
  $query = "SELECT * FROM categoria WHERE idCat=$idCat";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombreCat = $row['nombreCat'];
    
  }
}

if (isset($_POST['updateCat'])) {
  $idCat = $_GET['idCat'];
  $nombreCat= $_POST['nombre-categoria'];
 

  $query = "UPDATE categoria set nombreCat = '$nombreCat' WHERE idCat=$idCat";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Archivo Modificado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index-category.php');
}

?>
 <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit-category.php?idCat=<?php echo $_GET['idCat']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre-categoria" type="text" class="form-control" value="<?php echo $nombreCat; ?>">
        </div>

        <button class="btn-success" name="updateCat">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>

