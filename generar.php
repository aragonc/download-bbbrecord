<?php 

include "db.php";

if(isset($_POST['generar'])){
    
    $url = $_POST['url-meeting'];
    $idcat = $_POST['video-categoria'];
    $name = $_POST['video-name'];
    $duracion = $_POST['video-duration'];


    $query = "INSERT INTO videos(url,idCat,nombre,duracion) VALUES ('$url','$idcat','$name','$duracion')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed");
    }

    $_SESSION['message'] = "Archivo guardado satisfactoriamente";
    $_SESSION['message_type'] = "success";

    header("Location: index.php");



}





