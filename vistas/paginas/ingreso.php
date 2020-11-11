Ingreso
<div class="d-flex justify-content-center">
	<form class="p-5 bg-light" method="POST">

	<div class="form-group">
		<label for="email">Correo electrónico</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-envelope"></i></span>
			</div>
			<input type="text" class="form-control" placeholder="Enter email" id="email" name="ingEmail">
		</div>

	</div>
	<div class="form-group">
		<label for="pwd">Contraseña:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-lock"></i></span>
			</div>
			<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="ingPassword"">
		</div>
	</div>
	<?php 
		$ingreso = new ControladorFormularios();
		$ingreso -> ctrIngreso();
	 ?>
	<button type="submit" class="btn btn-primary">Ingresar</button>
</form>
</div>
