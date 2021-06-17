<?php session_start();
require_once 'main/db.php';
$db = new db();
if(isset($_POST['generate-video'])){  
    $meeting = $_POST['meeting'];
    $category = $_POST['video-categoria'];
    $nameVideo = $_POST['video-name'];
    $videomin = $_POST['video-min'];
    $videoseg = $_POST['video-seg'];
    $dateMeeting= $_POST['video-date'];
   
    $result =$db->query("INSERT INTO video(id_meeting,id_category,name,minutes,seconds,date_meeting,status) VALUES (?,?,?,?,?,?,?)",[$meeting],[$category],[$nameVideo],[$videomin],[$videoseg],[$dateMeeting],[1]) ;
    
    if(!$result){
        die("query failed");
    }
    $_SESSION['message'] = "Archivo guardado satisfactoriamente";
    $_SESSION['message_type'] = "success";
    header("Location: index.php");
}
