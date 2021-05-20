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
			'Authorization: Basic YTJhYTA3YWFmYXJ0d2V0c2RBRDUyMzU2RkVER2VsQmVrM01IVndxNndXWWZ2R3ZpTEZDeFZlRUVnZWcyOm8yYW8wN29hZmFydHdldHNkQUQ1MjM1NkZFREdlUDYucWpycGhObG1zaG4vMWhaNkJPSmlXY3JEeWhzQw==',
			'Content-Type: application/x-www-form-urlencoded',
			'Cookie: XSRF-TOKEN=eyJpdiI6IlpVRFpEUkp0MlVtR1BKRWtkaVFWZFE9PSIsInZhbHVlIjoidThWVGRoNmVnNWI4dWpoeUM5VTZlVjU4OHN6YTZSTDZCNHUrY0pSdXZnUEg2U0krdVR3ZjF5bGl3c3hMSkhwY2JHWE9adHJDSStXWEY0cElNMDZhUkhoNHZBU0NFQVU2TGsyOVRPdnU4dCtKRjhKZzRHL2lubnlYdEFHMjBhTVYiLCJtYWMiOiJkNDZlZTBkNDg3ZDRmOTVjYjAyODE4OWNhYmI1MjQyOTk5ZmU0OGYxYzU4NzNjMTJjNWFjNWQyODU5MzdjZDZmIn0%3D; laravel_session=eyJpdiI6InJhcFFJc1lpT016bk55NUZpb2h4Rmc9PSIsInZhbHVlIjoiNXVhdEgrUzIrQS81N215UzkrTHNFelU2eWdLbzFDZm5lWEFLbExtS2pDSlJnZkhXelhCT3ZrLzdDb1VHWWwrRmhxeGZPWmt4U3BuSjRSb2NTYjBJRFZMeVRFWnQ3UkxWK2FaZVgyTiszZ3l6OVBTT0JWQlBmU2R0Y05yaERiY3IiLCJtYWMiOiIwOTI1M2M4MzUzNjQ0ZDliNGEzZDY1ZmNjMmNmNTgxYTcyMTI4OGY0M2M3MjlhNzQ5YWNlMzUzY2NiODQ4MGNmIn0%3D'
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	if (!$err) {
		$json = json_decode($response,true);
	      //echo "<pre>"; print_r($json); echo "</pre>";
	} else {
		echo "cURL Error #:" . $err;
	}
	curl_close($curl);
	//Obtener datos del login
	//$id_usuario = "a2ya10aod6FrtB046dLW4.rneNjKeXv8wLweOt0oF6r/IL5fxYw9FlR5QvOu";
	//$llave_secreta = "o2yo12ogwywJ/wFrxSDfW9jMv4HAO9DPja7j8m5owr7Ev/e8RFnJMfoh5cfC";
	//$credenciales = "Basic ".base64_encode($id_usuario.":".$llave_secreta);
	//echo $credenciales;
	$id_user = $_GET["idUser"];
	//echo $credencialesIndex;
	////////////////////////////////////////////////////////////////////////////////////////


	$curlUsuario = curl_init();

	curl_setopt_array($curlUsuario, array(
		CURLOPT_URL => 'http://apirest-laravel.com/usuarios',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_POSTFIELDS => 'nombre=juan&apellido=sanchez&correo=juan%40gmail.com',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Basic YTJ5YTEwYW9kNkZydEIwNDZkTFc0LnJuZU5qS2VYdjh3THdlT3Qwb0Y2ci9JTDVmeFl3OUZsUjVRdk91Om8yeW8xMm9nd3l3Si93RnJ4U0RmVzlqTXY0SEFPOURQamE3ajhtNW93cjdFdi9lOFJGbkpNZm9oNWNmQw==',
			'Content-Type: application/x-www-form-urlencoded',
			'Cookie: XSRF-TOKEN=eyJpdiI6ImxFaHdsaUdGajhVMXdoYWZuU1pTSEE9PSIsInZhbHVlIjoiVXg3bXlFbXdQTVZHZFhIR1hWcFFYNmxqRTVyRHdYSkVxRnRrRU4ydy9RYVpGQTVVVjYrQ2lGOU9xUS9ha3ExTXA0SmZ3Q1pGS0hTdHJlRnRiK1VWcTM1aGRVeWRCMFVFZklLTDVSbTI1MW5FS1lkVVBVZmlsNEtiRmF5bFRDUUsiLCJtYWMiOiI4MTk3ZjZkYjkxOGRmMWM5MDMzZDE1YzM2ZGU5ODdmZmYxYmY0MmExZDAwY2Q1OGUyNDA2MjM2OTAzYjg4ZjdkIn0%3D; laravel_session=eyJpdiI6IjJvelE4VjRsQW5JQVZkQngrbHNVZEE9PSIsInZhbHVlIjoiS3VudmFhTkdnbTJXenZwdGFQcFZBbUVFZlZYNVNoMWxuWm03QzU0QnpTV085UVlVYThYZnpwcGNSaTF2VjNIY2tsZitjSFU0bGxmeHdaWGRrWnE1NnZXbnNJZ1V2WkU5NlFpdWpjUzhSdDhtbFpWdkd4UW5xNndLMXh5bzlqcloiLCJtYWMiOiI1MmY5Y2IxMzdmZDYwYWEzYWIzYWUxOGNkZjA3Mjg5ZjQ5YjMxYmU2MTdmODgwYTljNDc2ZjEwYmFmZWUzZGRkIn0%3D'
		),
	));

	$responseUsu = curl_exec($curlUsuario);
	$errUsu = curl_error($curlUsuario);
	if (!$errUsu) {
		$jsonUsu = json_decode($responseUsu,true);
	      //echo "<pre>"; print_r($json); echo "</pre>";
	} else {
		echo "cURL Error #:" . $errUsu;
	}
	//echo $response;
	curl_close($curlUsuario);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Libros de Usuario</title>
	<link rel="stylesheet" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid">
	    <div class="container">
	      <div class="row">
	      
	        <?php foreach($json["detalles"] as $key => $value): ?>
	        	<?php foreach($jsonUsu["detalles"] as $keyUsu => $valueUsu): ?>
	        		<?php $credencialesUsu = "Basic ".base64_encode($valueUsu['id_usuario'].":".$valueUsu['llave_secreta']); ?>
	        		<?php if($valueUsu['id_usuario'] == $id_user){ ?>
		        		<?php if($value['id_usu'] == $valueUsu['id']){ ?>
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
				        <?php } ?>
				    <?php } ?>
		        <?php endforeach ?>
	        <?php endforeach ?>
	        
	      </div>
	    </div>
	  </div>
</body>
</html>