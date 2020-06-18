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
<body>
<div id="page" class="page">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img width="300px" src="images/logo_bbb_convert.svg">
                </div>
                <div class="page-header">
                    <h2>Generar un BBB mp4!</h2>
                </div>
                <form id="generate-record" method="post">
                    <div class="form-group">
                        <label for="url-meeting">URL del Meeting BBB</label>
                        <input type="text" name="url-meeting" class="form-control" id="url-meeting" required
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="video-name">Nombre para el archivo</label>
                        <input type="text" name="video-name" class="form-control" id="video-name" required
                               placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="video-duration-min">Duración Total / Minutos</label>
                        <input type="text" name="video-duration-min" class="form-control" id="video-duration-min"
                               required placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="video-duration-seg">Duración Total / Segundos </label>
                        <input type="text" name="video-duration-seg" class="form-control" id="video-duration-seg"
                               required placeholder="">
                    </div>

                    <div id="counter" style="display: none;">
                        <div class="form-group">
                            <div class="alert alert-info">
                                <strong>¡Generando la grabación!</strong> en
                                <strong>
                                    <span id="minute"></span>:<span id="second"></span>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div id="convert" style="display: none;">
                        <div class="form-group">
                            <div class="alert alert-warning">
                                <strong>¡Se esta procesando!</strong>, se esta generando la conversión a MP4 este
                                proceso puede tardar unos minutos...
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" id="btn-generate" type="submit">
                            <i class="fas fa-download"></i> Generar grabación
                        </button>
                        <a class="btn btn-info btn-block" id="btn-view" href="list.php"><i class="fas fa-file-video"></i>
                            Ver archivos generados</a>
                    </div>
                </form>
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
        $("#generate-record").submit(function (e) {
            e.preventDefault();

            $("#counter").show();
            $("#btn-generate").text('Generando la grabación...');
            $("#btn-generate").prop('disabled', true);

            var minutesText = $("#video-duration-min").val();
            var secondsText = $("#video-duration-seg").val();
            var timer2 = minutesText + ":" + secondsText
            var totalTime = parseInt(minutesText) * 60 + parseInt(secondsText);

            var interval = setInterval(function () {
                var timer = timer2.split(':');
                var minutes = parseInt(timer[0], 10);
                var seconds = parseInt(timer[1], 10);
                --totalTime;
                --seconds;
                minutes = (seconds < 0) ? --minutes : minutes;

                if (minutes < 0) clearInterval(interval);
                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;

                timer2 = minutes + ':' + seconds;

                $('#minute').html(minutes);
                $('#second').html(seconds);
                console.log(totalTime);
                if (totalTime === -1) {
                    $('#minute').html('0');
                    $('#second').html('00');
                    $("#convert").show();
                }
            }, 1000);

            $.ajax({
                url: 'generar.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    //$("#response").text(result);
                    var jsonData = JSON.parse(response);
                    console.log(jsonData);
                }

            });
        });
    });
</script>
</body>
</html>