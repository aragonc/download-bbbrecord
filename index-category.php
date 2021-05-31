<?php
include("db.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<table class="table table-hover">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Categorias</title>
</head>
<body>
    
<div  class="container p-4">

    <div class="row">

            <div class="col-md-6">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                   <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                        <?php session_unset(); }  ?>
                <div class="card-body">
                <h1>Generar Nueva Categoria</h1>
                  <form method="post" action="add-category.php">
                        <div class="form-group">
                            <label for="nueva-categoria">Nueva Categoria</label>
                            <input type="text" name="nueva-categoria" class="form-control" id="nueva-categoria" placeholder="">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" name="generarCat">Agregar</button>
                    </div>
                    <div>
                    <a href="index.php"><div type="button" class="btn btn-info">Regresar a Videos</div></a></div>
                  </form>

                </div>

            </div>
            <div class="col-md-6">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre Cat</th>   
                            <th>Acciciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = "SELECT * FROM categoria";
                         $result_cat = mysqli_query($conn,$query);
                                    while ($row = mysqli_fetch_array($result_cat)){ ?>
                        <tr>
                            <td><?=$row['idCat']?></td>
                            <td><?=$row['nombreCat']?></td>
                            <td>
                               <a href="edit-category.php?idCat=<?php echo $row['idCat']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>          
                               <a href="delete-category.php?idCat=<?php echo $row['idCat']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>  
                        
                        <?php } ?>                  
                    </tbody>
            </table>


                
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>