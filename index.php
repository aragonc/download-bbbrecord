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
                <h1>Generar un BBB Record!</h1>
                <form id="generate-record" method="post">
                    <div class="form-group">
                        <label for="url-meeting">URL del Meeting BBB</label>
                        <input type="text" name="url-meeting" class="form-control" id="url-meeting" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="video-name">Nombre del archivo de video de salida</label>
                        <input type="text" name="video-name" class="form-control" id="video-name" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="video-duration-min">Duración Total / Minutos</label>
                        <input type="text" name="video-duration-min" class="form-control" id="video-duration-min" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="video-duration-seg">Duración Total / Segundos </label>
                        <input type="text" name="video-duration-seg" class="form-control" id="video-duration-seg" placeholder="">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Generar video de descarga</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#generate-record").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: 'generar.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function (result) {
                    $("#response").text(result);

                }

            });
        });
    }
</script>
</body>
</html>