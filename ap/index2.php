<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Libros</title>
  <link rel="stylesheet" href="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</head>
<body>
  <?php

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://apirest-laravel.com/libros',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_POSTFIELDS => 'nombre=juan&apellido=sanchez&correo=juan%40gmail.com',
      CURLOPT_HTTPHEADER => array(
      'Authorization: Basic YTJhYTA3YWFmYXJ0d2V0c2RBRDUyMzU2RkVER2VuNDczMmk5c1V1QU4zLmJmTUZiWklpdFhtMjA4STRXOm8yYW8wN29hZmFydHdldHNkQUQ1MjM1NkZFREdlc0theXRtckQ4QjRrVkFuR3JaZGFlczk0ancvVzNjNg==',
      'Content-Type: application/x-www-form-urlencoded',
      'Cookie: XSRF-TOKEN=eyJpdiI6IlZmVnVNcjE4UG5nWjA3UTZ3ZEp5eHc9PSIsInZhbHVlIjoiK0FCcVVvVlZWaUJuVkFOazhhT0ZzU3NWRHBIWENjckNNeW11a0hkQllxcEozcGZkWjl4ZjhHWXNZZG41M1dIOEJ1NWZOQzFzTHR1dklvSXEwY1hEM1hQU3c3MHdqTnp1WmIrS0dmU1JVcVZadzI5dXc3S3I0dWhmTVBhVkd2dFAiLCJtYWMiOiJlZGZmYjJjMWVjY2UwMWQyMDViZGZmNjc3NGFkNmZmYzMwNmQxYmFhZjExYzJlNGVjNWUyYTVmMmIxOWMwNzBkIn0%3D; laravel_session=eyJpdiI6IjVadWh2d1Z2eWZ4ODdaRHp2M0lKMVE9PSIsInZhbHVlIjoiTTAvUHJSdkMzVENDVlp4SE1PNmJxempCbFNZOTJLZU52QnFNdWY2d0xYZWhxVGxEbkFmOEZTb05zTVpIaFVIcXU5M0FHWDl6V2loajQ5M0JoUzhleWo2d0hsWldvZWFQODg2RnhEclJEUTFyaW9RN2RoSi9kbTdmbEVXKzloQk4iLCJtYWMiOiI0MDUzNmNhNzdmMzk2N2E5MTk1YWJjYTdkZWQyZWE2Y2YzNzZkM2M3YWYwNzI4YjhiMGIxN2U5NDdkZDlmNTMwIn0%3D'
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if (!$err) {
      $json = json_decode($response,true);
      //echo "<pre>"; print_r($json); echo "</pre>";
    } else {
      echo "cURL Error #:" . $err;
    }
    //$datosUsu = $_GET['credenciales'];
    $idUser = $_GET['idUser'];
  ?>
  <a href="vista/vistaUsuarioLibro.php?idUser=<?php echo $idUser; ?>">Mostrar Libros de Usuario</a>
  <!--<p><?php echo $datosUsu; ?></p>-->
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        
        <?php foreach($json["detalles"] as $key => $value): ?>
          <div class="col-3">
            <div class="card">
              <div class="card-header">
                <img src="<?php echo $value["imagen"] ?>" alt="" class="img-fluid">
                <div class="card-body">
                  <h4><?php echo $value["titulo"]; ?></h4>
                  <h3><?php echo $value["editorial"]; ?></h3>
                  <div class="card-footer">
                    <h2><?php echo $value["precio"]; ?></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        
      </div>
    </div>
  </div>
</body>
</html>