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
    <title>Generar un BBB Record!</title>
</head>
<?php

    include "scandir.php";
    $folder = __DIR__.'/files';
    $files = scanDir::scan($folder,'mp4');

?>
<body>
<div id="page" class="page">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <img width="200px" src="images/bigbluebutton-logo.png">
                <div class="page-header">
                    <h2>Lista de videos generados</h2>
                </div>
                <div class="action">
                    <a class="btn btn-info mb-2" href="index.php"><i class="fas fa-chevron-left"></i> Regresar</a>
                </div>
                <table>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        $count = 0;
                        foreach ($files as $file){
                            $count++;
                            $url = 'files/'.$file;
                            echo '<tr><td>'.$count.'</td><td><i class="fas fa-video"></i> ';
                            echo '<a href="'.$url.'">'.$file.'</a></td>';
                            echo '<td><a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-file-download"></i> Descargar</a></td></tr>';
                        }
                    ?>
                        </tbody>
                    </table>

                </table>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
</body>
</html>