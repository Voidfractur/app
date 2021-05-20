<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <form class="row g-3" method="POST" action="">
        <div class="col-md-6">
            <label for="inputcve" class="form-label">Clave del Libro</label>
            <input type="text" class="form-control" id="inputcve" name="inputcve">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-danger" name="btnEliminar">Elminar Libro</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST["btnEliminar"])) {
    $titulo = urlencode($_POST["inputcve"]);


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'apirest-laravel.com/libros/10',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic YTJ5YTEwYVhrbkpKN1lmbVd6b2tSVGlYQnNtSi42aUU5Sk5IdkhkVkJTZzlRMTFCUzNRV05OMkRLWXV1Om8yeW8xMm9kdzZMNUtFS1ZjcVRCQm4wc2JqM0dlUmhzc3hrSkJGWHN6d0VkeHJhTVFXOUY2Si5DSlVmRw=='
        ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);
    $json = json_decode($response, true);
    if ($json["status"] == 202) {
        echo '<div class="alert alert-success" role="alert">
        Libro Eliminado Correctamente!
      </div>';
    }
    if ($json["status"] == 403) {
        echo '<div class="alert alert-warning" role="alert">
        ' . $json["status"] . ' ' . $json["detalle"] . '
      </div>';
    } 
    if ($json["status"] == 404) {
        echo '<div class="alert alert-warning" role="alert">
        ' . $json["status"] . ' ' . $json["detalle"] . '
      </div>';
    } 
    if ($json["status"] == 405) {
        echo '<div class="alert alert-Danger" role="alert">
        ' . $json["status"] . ' ' . $json["detalle"] . '
      </div>';
    } 
        
}


?>