Registro
<div class="d-flex justify-content-center">
	<form class="p-5 bg-light" method="POST">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
			</div>
			<input type="text" class="form-control" placeholder="Enter nombre" id="nombre" name="regNombre">
		</div>
	</div>

	<div class="form-group">
		<label for="email">Correo electrónico</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-envelope"></i></span>
			</div>
			<input type="text" class="form-control" placeholder="Enter email" id="email" name="regEmail">
		</div>

	</div>
	<div class="form-group">
		<label for="pwd">Contraseña:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-lock"></i></span>
			</div>
			<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="regPassword">
		</div>
	</div>
	<?php 
		$registro = ControladorFormularios::ctrRegistro();
		if ($registro == 'ok') {
			echo '<script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
			echo '<div class="alert alert-success">El usuario a sido registrado</div>';
		}
	 ?>
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>
