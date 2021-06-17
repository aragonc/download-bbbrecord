<?php
require_once 'main/db.php';
session_start();
 if(!isset($_SESSION['usuario'])){
  header('Location:login.php');
}

$db = new db();

$meeting = '';
$nameVideo= '';
$videomin='';
$videoseg='';
$dateMeeting ='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = $db->query("SELECT v.id, v.id_meeting,c.id_category ,c.nameCategory ,v.name , v.minutes,v.seconds,v.date_meeting,v.status FROM video v INNER JOIN category c ON c.id_category = v.id_category ORDER BY date_meeting DESC")->fetchArray();
  
  if ($result) {
    
    $meeting = $result['id_meeting'];
    $idCategory= $result['id_category'];
    $nameCategory = $result['nameCategory'];
    $nameVideo = $result['name'];
    $videomin = $result['minutes'];
    $videoseg = $result['seconds'];
    $dateMeeting = $result['date_meeting'];
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

  $db->query("UPDATE video set id_meeting = ?, id_category=?, name = ? , minutes = ? , seconds = ? ,date_meeting = ? WHERE id=?",[$meeting,$idCategory,$nameVideo,$videomin,$videoseg,$dateMeeting,$id]);

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
                               
                    <?php
                      $result = $db->query("SELECT * FROM category")->fetchAll();  
                     foreach($result as $row)  { ?>
                    <option value="<?= $row['id_category'] ?>"><?= $row['nameCategory']; ?></option>
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