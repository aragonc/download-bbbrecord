
<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
  }
include("db.php"); 
$title = "Generar Video"; 
include("header.php") 
?>         
           <div class="col-md-12 login">
                    <div class="" style="margin-bottom: 15px;">Lista de Videos Generados</div>
            </div>
            <div class="col-md-3"></div >
            <div class="col-md-9">
            <div style="margin-bottom: 15px;">
                <a class="btn btn-lila" href="s"> << Regresar a Videos</a>
            </div>
            </div>
            <div class="col-md-3"></div >

            <div class="col-md-6">
                <div>Videos para Descargar</div>
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
                        $query = "SELECT * FROM videos ";
                         $result_cat = mysqli_query($conn,$query);
                                    while ($row = mysqli_fetch_array($result_cat)){ ?>
                        <tr>
                            <td><?=$row['idVideo']?></td>
                            <td><?=$row['nameVideo']?></td>
                            <td>
                               <a href="edit-category.php?idCategory=<?php echo $row['idCategory']?>" class="btn btn-green">Ver</a>          
                               <a href="delete-category.php?idCategory=<?php echo $row['idCategory']?>" class="btn btn-secondary"><i class="fas fa-download"></i>Descargar</a>
                               <a href="delete-category.php?idCategory=<?php echo $row['idCategory']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Eliminar</a>
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