<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
}
include("db.php");
$title = "Categoria";
include("header.php") ?>
        <div class="col-md-3"></div >
            <div class="col-md-6">
            <?php getMessage();  ?>
                <div class="card-body">
                <h1 style="font-size:24px;text-align: center; font-weight:bold;margin-bottom: 15px; margin-top: 15px;">Agregar Categoria</h1>
                <div style="margin-bottom: 15px;">
                    <a class="btn btn-lila" href="index.php"> << Regresar a Videos</a>
                </div>
                  </form> 
                <form method="post" action="add-category.php">
                        <div class="form-group">
                            <label  for="new-category">Nombre de la Categoria</label>
                            <input  type="text" name="new-category" class="form-control" id="new-category" placeholder="">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" name="generate-category">Agregar</button>
                    </div>
                </div>
            </div>
           
            <div class="col-md-12"></div>
            <div class="col-md-3"></div >
            <div class="col-md-6">
                <div>Lista de categorias</div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>   
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = "SELECT * FROM category";
                         $result_cat = mysqli_query($conn,$query);
                                    while ($row = mysqli_fetch_array($result_cat)){ ?>
                        <tr>
                            <td><?=$row['idCategory']?></td>
                            <td><?=$row['nameCategory']?></td>
                            <td>
                               <a href="edit-category.php?idCategory=<?php echo $row['idCategory']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>          
                               <a href="delete-category.php?idCategory=<?php echo $row['idCategory']?>" onclick="return confirmDelete()" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>  
                        
                        <?php } ?>                  
                    </tbody>
            </table>           
    </div>
</div>
</div>
</div>
<?php include("footer.php") ?>