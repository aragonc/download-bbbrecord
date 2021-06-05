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
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
    <title>Generar un BBB Record!</title>
</head>
<?php

include "scandir.php";

$folder = __DIR__.'/files';
$files = scanDir::scan($folder, 'mp4');

$fileGet = isset($_GET['file'])  ? $_GET['file'] : "";
$action = isset($_GET['action'])  ? $_GET['action'] : "";
$delete = false;
$msg = null;

switch ($action){
    case 'delete':
        if($fileGet){
            if (unlink($_GET['file'])) {
                $delete = true;
                $msg = "El archivo fue eliminado correctamente";
                header("Refresh:0; url=list.php");
                exit;
            }
        }
        break;
}

?>
<body>
<div id="page" class="page">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img width="300px" src="images/logo_bbb_convert.svg">
                </div>
                <div class="page-header">
                    <h2>Lista de videos generados</h2>
                </div>
                <div class="action">
                    <a class="btn btn-lila mb-2" href="index.php"><i class="fas fa-chevron-left"></i> Regresar</a>
                </div>
                <?php
                    if ($delete){
                        echo '<div class="alert alert-success">'.$msg.'</div>';
                    }
                ?>
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
                        foreach ($files as $file) {
                            $count++;
                            $url = 'files/'.$file;
                            echo '<tr><td>'.$count.'</td><td><i class="fas fa-video"></i> ';
                            echo '<a data-toggle="modal" data-video="'.$url.'" href="#" class="modal-show">'.$file.'</a></td>';
                            echo '<td><a href="download.php?file='.$file.'" class="btn btn-secondary btn-sm"><i class="fas fa-file-download"></i> Descargar</a>';
                            echo ' <a onclick="javascript: if (!confirm(\'Por favor, confirme su elección\')) return false;" class="btn btn-danger btn-sm" href="?action=delete&file='.$url.'"><i class="fas fa-trash-alt"></i> Eliminar</a></td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>

                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-video-label"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-video-label">Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               <video class="video-js" id="player" playsinline controls data-poster="images/poster.png">
                    <source src="" type="video/mp4"/>
                </video>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
<script src="https://cdn.plyr.io/3.6.2/plyr.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        // Change the second argument to your options:
        // https://github.com/sampotts/plyr/#options
        const player = new Plyr('video', {captions: {active: true}});

        // Expose player so it can be used from the console
        window.player = player;

        $('a[data-toggle="modal"]').on('click', function () {
            var urlvideo = $(this).data("video");
            console.log(urlvideo);
            // update modal header with contents of button that invoked the modal
            $('#modal-video-label').html('Video: ' + $(this).html());
            //$('#modal-video #player source').attr('src',urlvideo);

            var video = $('#modal-video #player')[0];
            video.src = urlvideo;
            video.load();
            //video.play();
            //fixes a bootstrap bug that prevents a modal from being reused
            $('#modal-video').modal()
        });

        $('#modal-video').on('hide.bs.modal', function(e) {
            var video = $('#modal-video #player')[0];
            video.src = '';
        });
    });
</script>
</body>
</html>