
<?php
include("db.php");
$url = '';
$nombre= '';
$duracion=0;

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM videos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $url = $row['url'];
    $idCat= $row['idCat'];
    $nombre = $row['nombre'];
    $duracion = $row['duracion'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $url= $_POST['url-meeting'];
  $idCat= $_POST['video-categoria'];
  $nombre= $_POST['video-name'];
  $duracion = $_POST['video-duration'];

  $query = "UPDATE videos set url = '$url', idCat='$idCat', nombre = '$nombre' , duracion = '$duracion' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Archivo Modificado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
 <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit-video.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="url-meeting" type="text" class="form-control" value="<?php echo $url; ?>">
        </div>


        <div class="form-group">
                <label for="video-categoria">Categoria</label>
                 <select  class="btn btn-secondary" name="video-categoria" >
                                        
                    <?php $query2 =  "SELECT * FROM categoria";
                     $resultCat = mysqli_query($conn,$query2);
                     while ($cat = mysqli_fetch_array($resultCat)) { ?>
                    <option value="<?= $cat['idCat'] ?>"> <?=$cat['nombreCat'] ?></option>
                     <?php  } ?>
                                
                 </select>
                                  
       </div>



        <div class="form-group">
          <input name="video-name" type="text" class="form-control" value="<?php echo $nombre; ?>">
        </div>

        <div class="form-group">
          <input name="video-duration" type="text" class="form-control" value="<?php echo $duracion; ?>">
        </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>

