<?php 

require_once 'main/db.php';
session_start();

 if(!isset($_SESSION['usuario'])){
  header('Location:login.php');
}

$db = new db();
$meeting = '';
$nameCategory = '';

if  (isset($_GET['id_category'])) {
  $idCategory = $_GET['id_category'];
  $result = $db->query("SELECT * FROM category WHERE id_category=?",[$idCategory])->fetchArray();
  if ($result) {
    $nameCategory = $result['nameCategory'];
  }
}

if (isset($_POST['updateCategory'])) {
  $idCategory = $_GET['id_category'];
  $nameCategory= $_POST['name-category'];
  $db->query("UPDATE category set nameCategory = ? WHERE id_category = ?",[$nameCategory,$idCategory]);  
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
             <a href="index-category.php"><div type="button" class="btn btn-lila" style="margin-bottom: 15px;margin-top: 0px;"> << Regresar a Categoria</div></a>
            </div>   
            </div > 
        <div class="col-md-3"></div>
        <div class="col-md-3"></div >
       
        <div class="col-md-6">
        <form action="edit-category.php?id_category=<?php echo $_GET['id_category']; ?>" method="POST">
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
    <?php include("footer.php") ?>


