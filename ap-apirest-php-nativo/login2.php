<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
$mensaje = "";
if (isset($_GET["iniciar"])) {
    $credenciales = base64_encode($_GET["user"] . ":" . $_GET["pass"]);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'apirest-php-nativo.com/login/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ' . $credenciales,
        )
        // 'Authorization: Basic YTJ5YTEwYVhrbkpKN1lmbVd6b2tSVGlYQnNtSi42aUU5Sk5IdkhkVkJTZzlRMTFCUzNRV05OMkRLWXV1Om8yeW8xMm9kdzZMNUtFS1ZjcVRCQm4wc2JqM0dlUmhzc3hrSkJGWHN6d0VkeHJhTVFXOUY2Si5DSlVmRw=='),
        //           'Cookie: XSRF-TOKEN=eyJpdiI6Ikh2ZndJQUVtbmtMbnNNQ3RKbFZiM0E9PSIsInZhbHVlIjoiS3pGbjVRcGR0eUhoYWJMeWVibS9PZ2FtTHFUNW1XQ0Vra25KdVBNUTYxdDlQWkplYU9VZUZmRVp0L09GaGdIVG1ndmNkc1FQYWd3Szl3S1VpNkVCMGtMR09wamtBdHJDbDhDTDNuLzRqclZEWmFGU29Lbjg3MnUzazRadUFhem0iLCJtYWMiOiJmZWI5NmE4ODNlZGE5MTQ3MzNmYjA2NmQ0OTg5OTllZmVkNzMyZmQxM2YxZjNiYTBmNWI3NGQ5MTk1YmNkOWNjIn0%3D; laravel_session=eyJpdiI6IkUzSjZyTjRvOHVGUEdwTWc4Wm5VM3c9PSIsInZhbHVlIjoiaDAvMzZwZjhJS1YvQUpSVnpmdEM5ZWJoWVgxMGZpd1FNN1UzNUZDTlVpYXNlSjdGM1Z3eVd1Qm1ZVmpjRWh1Z1hPalZXYWFQVFBsOU93MDRrcHBMY1JvVm9TYlRscHk2aWViandYYUZmV0NFZkxpNnJXZGxSWlQyYlQyb1hwdnoiLCJtYWMiOiIwYTZjZTkxYWRlYWEyYzY2NzljMTI5OWU4YmUxMmE1MjA5OTU3M2UyNjJiODcxYmVlMDRiNjQ3Y2RkNDExYzA5In0%3D'        ),
    ));
    //echo  'Authorization: Basic ' . $credenciales . '==';
    $response = curl_exec($curl);
    curl_close($curl);
    //echo $response;
    //$json = json_decode($response,true);
    //echo '<pre>'; print_r($response); echo'</pre>';
    $json = json_decode($response, true);
    if ($json["status"] == 200) {
        $_SESSION["credenciales"] = $credenciales;
        $_SESSION["user"] = $_GET["user"];
        $_SESSION["pass"] = $_GET["pass"];
        $_SESSION["usu"] = $json["id"];

        $mensaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Correcto!</strong> Iniciaste Sesion!. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header("Location: index.php");
    } else {
        $mensaje =  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong>  ' . $json["status"] . ' ' . $json["detalle"] . 'a
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="login2.php">
                <img src="img/logo_reducido.png" alt="" width="30" class="d-inline-block align-text-top"> MVE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

            </div>
        </div>
    </nav>

    <div class="background">
        <div class="page">
            <div class="container">
                <div class="left">
                    <div class="login">Iniciar Sesion</div>
                    <div class="eula"><img src="img/logo_reducido.png" alt="" height="90px">
                    </div>
                </div>
                <div class="right">
                    <svg viewBox="0 0 320 300">
                        <defs>
                            <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992" x2="307" y2="193.49992" gradientUnits="userSpaceOnUse">
                                <stop style="stop-color:#ff00ff;" offset="0" id="stop876" />
                                <stop style="stop-color:#ff0000;" offset="1" id="stop878" />
                            </linearGradient>
                        </defs>
                        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                    </svg>
                    <form action="" method="get">
                        <div class="form">
                            <label for="email">Usuario</label>
                            <input type="text" id="email" name="user">
                            <label for="password">Llave Secreta</label>
                            <input type="password" id="password" name="pass">
                            <input type="submit" id="submit" value="Ingresar" name="iniciar">
                        </div>
                    </form>

                </div>
            </div>
            <?php
            echo $mensaje;
            ?>
        </div>

        <script src="js/login2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    </div>

</body>

</html>