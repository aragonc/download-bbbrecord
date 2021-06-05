
<?php include("db.php") ?>
<?php $title = "Login"; ?>
<?php include("header.php") ?>

                        <div class="col-md-12 login">
                            <div class="">INICIAR SESION</div>
                        </div>
                        <div  class="col-md-4 "></div>
                        <div class="col-md-8">
                             <div class="form-group text">
                                 <label for="video-name">usuario</label>
                                 <input type="text" name="video-name" class="form-control" id="video-name" placeholder="">
                             </div>
                        </div>
                        <div  class="col-md-4 "></div>
                        <div class="col-md-8">
                                <div class="form-group text">
                                     <label for="video-name">password</label>
                                     <input type="text" name="video-name" class="form-control" id="video-name" placeholder="">
                               </div>
                        </div>
                        <div  class="col-md-4 "></div>
                        <div class="col-md-5">
                        <div class="form-group" style="    margin-left: 100px;;">
                                    <button class="btn btn-orange" type="submit" name="generate-video">INICIAR SESSION</button>
                                     </div>
                        </div>
                               

                       
                </form>
            </div>
        </div>


    </div>
    <?php include("footer.php") ?>