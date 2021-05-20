<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
   
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'apirest-laravel.com/libros',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJ5YTEwYVhrbkpKN1lmbVd6b2tSVGlYQnNtSi42aUU5Sk5IdkhkVkJTZzlRMTFCUzNRV05OMkRLWXV1Om8yeW8xMm9kdzZMNUtFS1ZjcVRCQm4wc2JqM0dlUmhzc3hrSkJGWHN6d0VkeHJhTVFXOUY2Si5DSlVmRw==',
    'Cookie: XSRF-TOKEN=eyJpdiI6InMrdEUwcFY0RFg0OEZ5UFNPNit3ZEE9PSIsInZhbHVlIjoid3VsNjQ0TFdrSHRLVi83TnhqR3JxeUhoU1U5cmIyZXplR3lWSmdWeWFsRzJzZGFBZjZtOWNld1k2aCtRQVZWQmt5UnhIUUFhbVZZMkxnenVOTWdYNWVpV3ZEdm1Cd1RiZ3lNalBLV1Rlc1FUMUU0dUtxUlpDbEFCTVJ3aGpzcVIiLCJtYWMiOiIxMGQzZmE3NGQ2NzI1Yjg1NWY5YmFkNDEzYmZlYmZmNmFhYjFmMjM5YTBlNzQzMTk4NzQ1M2ZmM2M1MDFjNDU4In0%3D; laravel_session=eyJpdiI6ImUzZCt6RjQ0bTFWK04yR2JvSFQ2c0E9PSIsInZhbHVlIjoiYkx6TjV5THI3VnpoMlBwbjNpOHJaRzkrQ3RFY0JrRU1wSEd2NU5SRU1yY2RxRlJTbXJ0MnNPMU9aa01IaGt2eStaeXFOZkJLbmcvN1ZPWUhFSURHZjVyNzBYanNOTzNPRmxzUW1OZmdlZjFMUzNURnNuZFozS2hHWWFyZE1UQUIiLCJtYWMiOiJiMjAyOTBjMWY2YTE2OTYzNWIyYzBiOGM2OTVhMjY5OTI1OWQ5ZWM1NTNmMDFkZmQ0ZTkyZWIxMmMxMTY3YWExIn0%3D'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$json = json_decode($response,true);
//echo '<pre>'; print_r($response); echo'</pre>';

?> 
<div class="container-fluid">
<div class="container">
<div class="row">
<?php
        foreach ($json["detalles"] as $key => $value) {
?>

<div class="col-3">
<div class="card">
<div class="card-header">
<img src="<?php echo $value["imagen"]; ?>" class="img-fluid">
<div class="card-body">
<h4><?php echo $value["titulo"] ?> </h4>
<h3><?php echo $value["editorial"] ?></h3>

<div class="card-footer">
<h2>$<?php echo $value["precio"] ?></h2>
</div>
</div>
</div>
</div>
</div>
<?php
      }
?>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>
