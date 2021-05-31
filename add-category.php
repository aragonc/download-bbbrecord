<?php 

include "db.php";

if(isset($_POST['generarCat'])){
    
   
    $nombrecat = $_POST['nueva-categoria'];

    $query = "INSERT INTO categoria(nombreCat) VALUES ('$nombrecat')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed");
    }

    $_SESSION['message'] = "Archivo guardado satisfactoriamente";
    $_SESSION['message_type'] = "success";

    header("Location: index-category.php");



}
