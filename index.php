<?php 
session_start();
 if(!isset($_SESSION['usuario'])){
   header('Location:login.php');
 }
include("db.php");
$title = "Inicio";                  
include("header.php") ?>        
<div class="col-md-12" style="padding-top: 15px;">
        <?php getMessage();  ?>
</div> 
                        <div class="col-md-12">
                        <?php if(isset($_SESSION['usuario'])): ?>
                            <div class="col-md-12 login">
                                <div>USUARIO :<?= $_SESSION['usuario'];?></div>  
                            </div>
                        <?php endif; ?>
                        
                        <div class="cola">Cola De Grabaciones</div>
                        </div>
                                 <div class="col-md-12">
                                    <div class="card-bottom">
                                       <div></div>
                                        <a href="index-category.php" class="btn btn-primary btn-purple " type="submit" name="agregar-categoria">Agregar Categoria</a>
                                        <a href="add-video.php" class="btn btn-primary btn-green" type="submit" name="agregar-reunion">Agregar Reunión BBB</a>
                                        <a href="generate-video.php" class="btn btn-primary btn-blue" type="submit" name="videos-generados">Videos Generados</a>
                                    </div>
                                 </div>

                       <div class="col-md-12">
                       <div class="list ">LISTA DE REUNIONES</div>
                            <table class="table table-bordered">
                                <thead>
                                    
                                    
                                    <br>
                                    <tr>
                                        <th>Url</th>
                                        <th>Categoria</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Duracion</th>
                                        <th>Acciciones</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = "SELECT v.idVideo, v.url,c.idCategory ,c.nameCategory ,v.nameVideo , v.minutesVideo,v.secondsVideo,v.date FROM videos v INNER JOIN category c ON c.idCategory = v.idCategory";
                                    $result_videos = mysqli_query($conn,$query);
                                    while ($row = mysqli_fetch_array($result_videos)){ ?>
                                            <tr>
                                            <td><a href="<?=$row['url']?>"><?=$row['url']?></a></td>
                                            <td><?=$row['nameCategory']?></td>
                                            <td><?=$row['nameVideo']?></td>
                                            <td><?=$row['date']?></td>
                                            <td><?=$row['minutesVideo'].".".$row['secondsVideo']?></td>
                                            
                                            <td>
                                                <a href="edit-video.php?idVideo=<?php echo $row['idVideo']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>          
                                                <a href="delete-video.php?idVideo=<?php echo $row['idVideo']?>" onclick="return confirmDelete()"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>         
                                   <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <?php include("footer.php") ?>