<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MVC</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- font awesome -->
<script src="https://kit.fontawesome.com/86f7407bc6.js" crossorigin="anonymous"></script>

</head>
<body>

<!-- Logotipo -->
	<div class="container-fluid">
		<h3 class="text-center py-3">Logotipo</h3>
	</div>
<!-- Botonera -->
	<div class="container-fluid bg-light">
		<div class="container">
			<ul class="nav nav-justified py-2 nav-pills">
				<li class="nav-item">
					<a href="registro.html" class="nav-link ">Registro</a>
				</li>
				<li class="nav-item">
					<a href="ingreso.html" class="nav-link">Ingreso</a>
				</li>
				<li class="nav-item">
					<a href="index.html" class="nav-link active">Inicio</a>
				</li>
				<li class="nav-item">
					<a href="salir.html" class="nav-link">Salir</a>
				</li>
			</ul>
		</div>
	</div>
<!-- Botonera -->
<!-- Contenido -->
<div class="container py-5">
	<?php include "paginas/inicio.php"; ?>
</div>
<!-- Contenido -->
</body>
</html>