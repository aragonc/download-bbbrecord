<?php 
session_start();
require_once 'main/db.php';
$db = new db();
 if(!isset($_SESSION['usuario'])){
   header('Location:login.php');
 }

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
                                        <th class="col-md-4">Meeting</th>
                                        <th>Categoria</th>
                                        <th>Nombre</th>
                                        <th class="col-md-2">Fecha</th>
                                        <th class="col-md-1">Duracion</th>
                                        <th >Estado</th>
                                        <th class="col-md-2">Acciciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result_videos=$db->query("SELECT v.id, v.id_meeting,c.id_category ,c.nameCategory ,v.name , v.minutes,v.seconds,v.date_meeting,v.status FROM video v INNER JOIN category c ON c.id_category = v.id_category ORDER BY date_meeting DESC")->fetchAll();     
                                    foreach ($result_videos as $row){ ?>
                                            <tr">
                                            <td><a href="<?=$row['id_meeting']?>"><?=$row['id_meeting']?></a></td>
                                            <td><?=$row['nameCategory']?></td>
                                            <td class="col-md-3"><?=$row['name']?></td>
                                            <td><?=$row['date_meeting']?></td>
                                            <td style="text-align: center;"><?=$row['minutes'].".".$row['seconds']?></td>
                                           <?php if ($row['status'] == 1){ ?>
                                            <td style="text-align: center;"><i style="font-size:20px; color:red; padding-top: 0px;" class="fas fa-circle"></i></td>
                                            <?php }else{ ?>
                                            <td style="text-align: center;"><i style="font-size:20px; color: green; text-align:center;padding-top: 0px;" class="fas fa-circle"></i></td>
                                            <?php } ?>
                                            <td>
                                                <a href="edit-video.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>          
                                                <a href="delete-video.php?id=<?php echo $row['id']?>" onclick="return confirmDelete()"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>         
                                   <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </form>
                <div class="col-md-12" style="text-align: right;">
                <a href="process.php" class="btn btn-orange " type="submit" name="generate-category">PROCESAR COLA DE GRABACIONES</a>                         
                </div>

            </div>
        </div>


    </div>

    <?php include("footer.php") ?>