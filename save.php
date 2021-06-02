<?php 

include "db.php";

if(isset($_POST['generar'])){
    
    $url = $_POST['url-meeting'];
    $category = $_POST['video-categoria'];
    $name = $_POST['video-name'];
    $duration = $_POST['video-duration'];


    $query = "INSERT INTO videos(url,idCat,nombre,duracion) VALUES ('$url','$category','$name','$duration')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed");
    }

    $_SESSION['message'] = "Archivo guardado satisfactoriamente";
    $_SESSION['message_type'] = "success";

    header("Location: index.php");


}
