<?php session_start();
 if(!isset($_SESSION['usuario'])){
  header('Location:login.php');
}
include("db.php");
$meeting = '';
$nameVideo= '';
$videomin='';
$videoseg='';
$dateMeeting ='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM video WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $meeting = $row['id_meeting'];
    $idCategory= $row['id_category'];
    $nameVideo = $row['name'];
    $videomin = $row['minutes'];
    $videoseg = $row['seconds'];
    $dateMeeting = $row['date_meeting'];
  }
}

if (isset($_POST['action'])) {
  $id = $_POST['id'];
  $meeting= $_POST['meeting'];
  $idCategory= $_POST['video-category'];
  $nameVideo= $_POST['video-name'];
  $videomin = $_POST['video-min'];
  $videoseg = $_POST['video-seg'];
  $dateMeeting = $_POST['video-date'];


 

  $query = "UPDATE video set id_meeting = '$meeting', id_category='$idCategory', name = '$nameVideo' , minutes = '$videomin', seconds = '$videoseg' ,date_meeting = '$dateMeeting' WHERE id=$id";

 
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Archivo Modificado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}
?>
<?php $title = "Editar Video"; ?>
<?php include("header.php") ?>

           <div class="col-md-12">
             <div class="cola">Editar Video</div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6"><div>
             <a class="btn btn-lila" style="margin-bottom: 15px;margin-top: 7px;" href="index.php"> << Regresar a Videos</a>
            </div>   
            </div > 
        <div class="col-md-3"></div>
        <div class="col-md-3"></div >
                        
             <div class="col-md-6">
            <form action="edit-video.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?> ">
        <div class="form-group">
          <input name="meeting" type="text" class="form-control" value="<?php echo $meeting; ?>">
        </div>


        <div class="form-group">
                <label for="video-categoria">Categoria</label>
              <div>
              <select  class="btn btn-secondary" name="video-category" >                      
                    <?php $query2 =  "SELECT * FROM category";
                     $resultCat = mysqli_query($conn,$query2);
                     while ($cat = mysqli_fetch_array($resultCat)) { ?>
                    <option value="<?= $cat['id_category'] ?>"> <?=$cat['nameCategory'] ?></option>
                     <?php  } ?>              
                 </select>            
              </div>           
       </div>

        <div class="form-group">
                <input name="video-name" type="text" class="form-control" value="<?php echo $nameVideo; ?>">
        </div>

        <div class="form-group">
               <label for="video-date">Fecha</label>
               <input type="date" name="video-date" class="form-control" value="<?php echo $dateMeeting; ?>" id="video-date" placeholder="">
        </div>
                                   
        <div class="form-group">
              <div class="column">
                  <div>
                        <label for="video-min">Duracion En Minutos</label>
                        <input style="width: 35%;"  type="number"  min="0" max="59" name="video-min" value="<?php echo $videomin; ?>" class="form-control" id="video-name" placeholder="">
                  </div>
                  <div>
                        <label for="video-seg">Duración en segundos</label>
                        <input style="width: 35%;" type="number"   min="0" max="59" name="video-seg" value="<?php echo $videoseg; ?>" class="form-control"  id="video-duration" placeholder=""  >
                  </div>
              </div>
          </div>
          <input type="hidden" name="action" value="update">
                <button class="btn btn-primary btn-green">
                  Update
                </button>
      </form>
      </div>                           
    </div>
  </div>
</div>
<?php include("footer.php") ?>