<?php 
function getMessage(){
    if (isset($_SESSION['message'])) {       
        echo '<div class="alert alert-'.$_SESSION['message_type'].' alert-dismissible fade show" role="alert">';
        echo '<div>'.$_SESSION['message'].'</div>';
        echo ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo ' <span aria-hidden="true">&times;</span>';
        echo ' </button>';
        echo ' </div>';
        unset($_SESSION['message']);
    }
}
 ?>
                
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/favicon.png">
    <script src="confirmation.js" rel="javascript"></script>
   
    <title><?php echo $title;?></title>
</head>
<body>
<div id="page">
<div class="container p-4">

    <div class="row">
    <div class="col-md-12">
    <a href="signoff.php">Cerrar Session</a>                           
                        <div class="card-body">
                                    <div>
                                        <img class="img-card" src="./images/logo_bbb_convert.svg" alt="">
                                    </div>
                                </div>
        </div>
