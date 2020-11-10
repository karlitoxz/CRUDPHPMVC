<?php 
	$usuarios = ControladorFormularios::ctrSRegistros();
	//print_r($usuarios)

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
						<button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
						<button class="btn btn-danger"><i class="fas fa-trash"></i></button>
					</div>
				</td>
			</tr>
		<?php endforeach ?>

	</tbody>
</table>