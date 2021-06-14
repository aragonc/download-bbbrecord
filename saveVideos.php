<?php session_start();
include "db.php";
if(isset($_POST['generate-video'])){  
    $url = $_POST['url-meeting'];
    $category = $_POST['video-categoria'];
    $nameVideo = $_POST['video-name'];
    $videomin = $_POST['video-min'];
    $videoseg = $_POST['video-seg'];
    $dateVideo= $_POST['video-date'];
    $status = $_POST['status'];

    $query = "INSERT INTO videos(url,idCategory,nameVideo,minutesVideo,secondsVideo,date,status) VALUES ('$url','$category','$nameVideo','$videomin','$videoseg','$dateVideo','$status')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed");
    }
    $_SESSION['message'] = "Archivo guardado satisfactoriamente";
    $_SESSION['message_type'] = "success";
    header("Location: index.php");
}
