<?php
	if($_POST){
		$autorizacion = 'Basic YTJhYTA3YWFmYXJ0d2V0c2RBRDUyMzU2RkVER2VuNDczMmk5c1V1QU4zLmJmTUZiWklpdFhtMjA4STRXOm8yYW8wN29hZmFydHdldHNkQUQ1MjM1NkZFREdlc0theXRtckQ4QjRrVkFuR3JaZGFlczk0ancvVzNjNg==';
		$credenciales = "Basic ".base64_encode($_POST["id_user"].":".$_POST["llave_secreta"]);
		$id_user = $_POST["id_user"];
		//$llave_secreta = $_POST["llave_secreta"];
		//echo $_POST["id_user"];
		//echo $_POST["llave_secreta"];
		//echo $credenciales;
		//echo "<br><br>";
		//echo $autorizacion;
		if ($credenciales == $autorizacion) {
			header("Location: index.php?idUser=$id_user");
			//header("Location: index.html");
			//echo "Bienvenido";
		} else {
			//header("Location: index.php?idUser=$id_user");
			echo "Usuario no existe";
		}
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.83.1">
	<title>LOGIN</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



	<!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<meta name="theme-color" content="#7952b3">


	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>


	<!-- Custom styles for this template -->
	<link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

	<main class="form-signin">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<img class="mb-4" src="img/bootstrap-logo.svg" alt="" width="72" height="57">
			<h1 class="h3 mb-3 fw-normal">Por</h1>

			<div class="form-floating">
				<input type="text" class="form-control" id="floatingInput" placeholder="ID Usuario" name="id_user">
				<label for="floatingInput">ID Usuario</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" id="floatingPassword" placeholder="Password Secret" name="llave_secreta">
				<label for="floatingPassword">Llave Secreta</label>
			</div>
			<button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
			<p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
		</form>
	</main>    
</body>
</html>