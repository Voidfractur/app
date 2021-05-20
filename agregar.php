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
            <label for="inputUser" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="inputUser" name="inputUser">
        </div>
        <div class="col-md-6">
            <label for="inputLlave" class="form-label">Llave Secreta</label>
            <input type="password" class="form-control" id="inputLlave" name="inputLlave">
        </div>
        <div class="col-6">
            <label for="inputTitulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="inputTitulo" name="inputTitulo" placeholder="Matematicas II">
        </div>
        <div class="col-6">
            <label for="inputEditorial" class="form-label">Editorial</label>
            <input type="text" class="form-control" id="inputEditorial" name="inputEditorial" placeholder="stronger">
        </div>
        <div class="col-md-4">
            <label for="inputArea" class="form-label">Area</label>
            <input type="text" class="form-control" id="inputArea" name="inputArea">
        </div>
        <div class="col-md-6">
            <label for="inputAutor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="inputAutor" name="inputAutor">
        </div>
        <div class="col-md-8">
            <label for="inputImagen" class="form-label">Imagen</label>
            <input type="url" class="form-control" id="inputImagen" name="inputImagen">
        </div>
        <div class="col-md-4">
            <label for="inputPrecio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="inputPrecio" name="inputPrecio">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="btnAgregarLibro">Agregar Libro</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST["btnAgregarLibro"])) {

    $usuario=$_POST["inputUser"];
    $llave=$_POST["inputLlave"];
    $titulo=urlencode($_POST["inputTitulo"]);
    $editorial=urlencode($_POST["inputEditorial"]);
    $area=urlencode($_POST["inputArea"]);
    $autor=urlencode($_POST["inputAutor"]);
    $imagen=urlencode($_POST["inputImagen"]);
    $precio=urlencode($_POST["inputPrecio"]);

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'apirest-laravel.com/libros',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'titulo='.$titulo.'&editorial='.$editorial.'&area='.$area.'&autor='.$autor.'&imagen='.$imagen.'&precio='.$precio.'',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic YTJ5YTEwYVhrbkpKN1lmbVd6b2tSVGlYQnNtSi42aUU5Sk5IdkhkVkJTZzlRMTFCUzNRV05OMkRLWXV1Om8yeW8xMm9kdzZMNUtFS1ZjcVRCQm4wc2JqM0dlUmhzc3hrSkJGWHN6d0VkeHJhTVFXOUY2Si5DSlVmRw==',
        'Content-Type: application/x-www-form-urlencoded'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $json = json_decode($response,true);
    if ($json["status"]==202) {
        echo '<div class="alert alert-success" role="alert">
        Libro registrado Correctamente!
      </div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">
        '.$json["status"].' '.$json["detalle"].'
      </div>';
    }
}


?>
