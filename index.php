
<?php include("db.php") ?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Generar un BBB Record!</title>
</head>
<body>
<div id="page">
    <div class="container p-4">
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
                                <h1>Generar un BBB Record!</h1>
                                <form method="post" action="generar.php">
                                    <div class="form-group">
                                        <label for="url-meeting">URL del Meeting BBB</label>
                                        <input type="text" name="url-meeting" class="form-control" id="url-meeting" placeholder="">
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
                                    <a href="indexCat.php"><div type="button" class="btn btn-primary">Agregar Cat</div></a>
                                  </div>
                                   

                                    <div class="form-group">
                                        <label for="video-name">Nombre del archivo de video de salida</label>
                                        <input type="text" name="video-name" class="form-control" id="video-name" placeholder="">
                                    </div>
                                     <div class="form-group">
                                        <label for="video-duration">Duración en segundos del video</label>
                                        <input type="text" name="video-duration" class="form-control" id="video-duration" placeholder="">
                                    </div>

                                    <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit" name="generar">Generar video de descarga</button>
                                     </div>
                                    </form>
                             </div>
                    </div>

                    <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Url</th>
                                        <th>Categoria</th>
                                        <th>NOmbre</th>
                                        <th>Duracion</th>
                                        <th>Acciciones</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = "SELECT v.id, v.url,c.idCat ,c.nombreCat ,v.nombre , v.duracion FROM videos v INNER JOIN categoria c ON c.idCat = v.idCat";
                                    $result_videos = mysqli_query($conn,$query);
                                    while ($row = mysqli_fetch_array($result_videos)){ ?>
                                            <tr>
                                            <td><a href="<?=$row['url']?>"><?=$row['url']?></a></td>
                                            <td><?=$row['nombreCat']?></td>
                                            <td><?=$row['nombre']?></td>
                                            <td><?=$row['duracion']?></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>          
                                                <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>         
                                   <?php } ?>
                                </tbody>
                            </table>
                    </div>
        </div>


    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>