<?php 
session_start(); 
require_once 'main/db.php';
$db = new db();
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
   
    <title>Login</title>
</head>
<body>
<div id="page">
<div class="container p-4">
    <div class="row">
    <div class="col-md-12">  
    <a href="signoff.php"></a>                             
                        <div class="card-body">
                                    <div>
                                        <img class="img-card" src="./images/logo_bbb_convert.svg" alt="">
                                    </div>
                                </div>
        </div>
                    
                        <div class="col-md-12 login">
                            <div class="">INICIAR SESION</div>
                        </div>
                        <?php if(isset($_SESSION['error-login'])): ?>
                            <div  class="col-md-4 "></div>
                            <div  class="col-md-4 ">
                             <div style="text-align: center; font-weight: bold;" class="alert alert-danger alert-dismissible fade show" role="alert"> 
                               <?= $_SESSION['error-login'];?>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                            </button>
                             </div>
                                <?php session_unset();   ?>
                                
                            </div>
                            <div  class="col-md-4 "></div>
                        <?php endif; ?>
                        
                        <div  class="col-md-4 "></div>
                        <div class="col-md-8">
                        <form method="post" action="validatelogin.php">
                             <div class="form-group text">
                                 <label for="usuario">usuario</label>
                                 <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario" required>
                             </div>
                        </div>
                        <div  class="col-md-4 "></div>
                        <div class="col-md-8">
                                <div class="form-group text">
                                     <label for="password">password</label>
                                     <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                               </div>
                        </div>
                        <div  class="col-md-4 "></div>
                        <div class="col-md-5">
                        <div class="form-group" style="margin-left:100px;;">
                             <button class="btn btn-orange" type="submit" name="generate-video">INICIAR SESSION</button>
                        </div>
                        </div>                                        
                </form>
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>