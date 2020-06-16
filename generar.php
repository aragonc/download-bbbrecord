<?php

$urlMeetingBBB = isset($_POST['url-meeting']) ? $_POST['url-meeting'] : "0";
$nameVideo = isset($_POST['video-name']) ? $_POST['video-name'] : "0";
$minutes = isset($_POST['video-duration-min']) ? $_POST['video-duration-min'] : 0 ;
$seconds = isset($_POST['video-duration-seg']) ? $_POST['video-duration-seg'] : 0 ;

$timeVideo = ($minutes * 60) + $seconds;

$urlNode = '/usr/bin/node';
$base = __DIR__.'/bbb-recorder';

?>

<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

    <title>Generar un BBB Record!</title>
</head>
<body>
<div id="page">
    <div class="container">
        <div class="card">
            <div class="card-body">


    <?php

$options = $urlNode.' '.$base.'/export.js "'.$urlMeetingBBB.'" 2>&1 '.$nameVideo.'.webm '.$timeVideo.' false';

$result = exec($options, $output, $return);


if($return){
    echo '<div class="alert alert-success" role="alert">Existio un problema en la ejecución</div>';
} else {
    echo '<div class="alert alert-danger" role="alert">El proceso se realizao correctamente.</div>';
}

echo '<pre><code>'.implode("\n", $output).'</code></pre>';

?>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php

