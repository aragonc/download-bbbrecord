<?php 

include "db.php";

if(isset($_POST['generate-category'])){
    
   
    $nameCategory = $_POST['new-category'];

    $query = "INSERT INTO category(nameCategory) VALUES ('$nameCategory')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed");
    }

    $_SESSION['message'] = "Archivo guardado satisfactoriamente";
    $_SESSION['message_type'] = "success";

    header("Location: index-category.php");



}
