<?php $title = "Generar un BBB Record!"; ?>
<?php include("db.php") ?>
<?php include("header.php") ?>
        <div class="col-md-3">

        </div >
                    <div class="col-md-6">
                     
                            <div class="card-body">
                                <h1 style="text-align: center;">Generar un BBB Record!</h1>
                                <div>
                    <a href="index.php"><div type="button" class="btn btn-lila" style="margin-bottom: 15px;margin-top: 7px;"> << Regresar a Videos</div></a>
                    </div>
                  </form>         
                                <form method="post" action="saveVideos.php">
                                    <div class="form-group">
                                        <label for="url-meeting">URL del Meeting BBB</label>
                                        <input type="text" name="url-meeting" class="form-control" id="url-meeting" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="video-name">Nombre del archivo de video de salida</label>
                                        <input type="text" name="video-name" class="form-control" id="video-name" placeholder="">
                                    </div>
                                  
                                  <div class="form-group">
                                  <label for="video-categoria">Categoria</label>
                                   <div>
                                   <select style="width:100%; border:1px solid black;"  class="btn btn-default" name="video-categoria" >
                                        
                                        <?php $query2 =  "SELECT * FROM category";
                                         $resultCategory = mysqli_query($conn,$query2);
                                         while ($category = mysqli_fetch_array($resultCategory)) { ?>
                                         <option value="<?= $category['idCategory'] ?>"> <?=$category['nameCategory'] ?></option>
                                          <?php  } ?>
                                
                                    </select>
                                   </div>
                                    <!-- <a href="index-category.php"><div type="button" class="btn btn-primary">Agregar Cat</div></a>  -->
                                  </div>

                                  <div class="form-group">
                                        <label for="video-date">Fecha</label>
                                        <input type="date" name="video-date" class="form-control" id="video-date" placeholder="">
                                    </div>
                                   
                                    <div class="form-group">
                                      <div class="column">
                                      <div>
                                       <label for="video-min">Duracion En Minutos</label>
                                        <input style="width: 35%;" type="number" value="0" min="0" max="59" name="video-min" class="form-control" id="video-name" placeholder="">
                                        </div>
                                        <div>
                                        <label for="video-seg">Duración en segundos</label>
                                        <input style="width: 35%;" type="number"  value="0" min="0" max="59" name="video-seg" class="form-control" id="video-duration" placeholder="">
                                       </div>
                                      </div>
                                    </div>

                                    
                                  

                                    <div class="form-group">
                                    <button class="btn btn-green btn-block" type="submit" name="generate-video">Guardar Reunión BBB</button>
                                     </div>
                                    </form>
                             </div>
                    </div>

                   
                </form>
            </div>
        </div>


    </div>



    <?php include("footer.php") ?>