
<?php
include("db.php");
$url = '';
$nameCategory = '';


if  (isset($_GET['idCategory'])) {
  $idCategory = $_GET['idCategory'];
  $query = "SELECT * FROM category WHERE idCategory=$idCategory";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nameCategory = $row['nameCategory'];
    
  }
}

if (isset($_POST['updateCategory'])) {
  $idCategory = $_GET['idCategory'];
  $nameCategory= $_POST['name-category'];
 

  $query = "UPDATE category set nameCategory = '$nameCategory' WHERE idCategory=$idCategory";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Archivo Modificado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index-category.php');
}

?>
<?php $title = "Actualizar Categoria"; ?>
<?php include("header.php") ?>

             <div class="col-md-12">
                        <div class="cola">Editar Categoria</div>
            </div>
             <div class="col-md-3">
            </div>
            <div class="col-md-6">
            <div>
             <a href="index.php"><div type="button" class="btn btn-lila" style="margin-bottom: 15px;margin-top: 0px;"> << Regresar a Videos</div></a>
            </div>   
            </div > 
        <div class="col-md-3"></div>
        <div class="col-md-3"></div >
       
        <div class="col-md-6">
        <form action="edit-category.php?idCategory=<?php echo $_GET['idCategory']; ?>" method="POST">
        <div class="form-group">
          <input name="name-category" type="text" class="form-control" value="<?php echo $nameCategory; ?>">
        </div>

        <button class="btn btn-green" name="updateCategory">
          Update
        </button>
      </form>
        </div>
                   
            </div>
        </div>


    </div>



