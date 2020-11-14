<?php 
	if (isset($_GET['token'])) {
		$item = "token";
		$valor = $_GET['token'];
		$usuario = ControladorFormularios::ctrSRegistro($item,$valor);
		//print_r($usuario);
	} else {
		# code...
	}
	

?>
Editar
<div class="d-flex justify-content-center">
	<form class="p-5 bg-light" method="POST">
	<div class="form-group">

		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
			</div>
			<input type="text" class="form-control" value="<?php echo $usuario['nombre']  ?>" placeholder="Enter nombre" id="nombre" name="actNombre">
		</div>
	</div>

	<div class="form-group">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-envelope"></i></span>
			</div>
			<input type="text" class="form-control" value="<?php echo $usuario['email']  ?>" placeholder="Enter email" id="email" name="actEmail">
		</div>

	</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-lock"></i></span>
			</div>
			<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="actPassword">
			<input type="hidden" name="tokenUsuario" value="<?php echo $usuario['token']?>">
			<input type="hidden" name="passActual" value="<?php echo $usuario['password']?>">
		</div>
	</div>
	<?php 
		$actualizar = new ControladorFormularios();
		$actualizar -> crtActRegistro();

	?>
	<button type="submit" class="btn btn-primary">Actualizar</button>
</form>
</div>
