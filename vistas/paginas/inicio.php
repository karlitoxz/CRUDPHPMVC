<?php 
	$usuarios = ControladorFormularios::ctrSRegistros();
	//print_r($usuarios)
	if (isset($_SESSION["validarIngreso"])) {
		if ($_SESSION["validarIngreso"] != 'ok') {
			echo "<script>window.location = 'index.php?pagina=ingreso'</script>";
			return;
		}
	}else{
			echo '<script>window.location = "index.php?pagina=ingreso";</script>';
			return;
	}
	
 ?>


<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Fecha Creación</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($usuarios as $key => $value): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['nombre']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['fecha']; ?></td>
				<td>
					<div class="btn btn-group">
						<div class="px-1">
							<a href="index.php?pagina=editar&token=<?php echo $value['token']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
						</div>						

						<div class="px-1">				
							<form method="post">
								<input type="hidden" value="<?php echo $value['token']; ?>" name="eliminarId" id="eliminarId">
								<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
							</form>
							<?php 
								$eliminarId = new ControladorFormularios();
								$eliminarId -> crtEliminarRegistro();
							 ?>
						</div>
					</div>
				</td>
			</tr>
		<?php endforeach ?>

	</tbody>
</table>