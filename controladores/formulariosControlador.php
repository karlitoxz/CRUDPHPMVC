<?php  
	
	class ControladorFormularios{


	//Registro
		public function ctrRegistro(){
			if (isset($_POST['regNombre'])) {

				$tabla = 'registros';
				$datos = array("nombre"=>$_POST['regNombre'],
								"email"=>$_POST['regEmail'],
								"password"=>$_POST['regPassword']);
				$respuesta = formulariosModelo::mdlRegistro($tabla,$datos);
				return $respuesta;
			} else {
				# code...
			} 
			
		}
	//Registro

	//Listar registros
			public function ctrSRegistros(){

				$tabla = 'registros';
				$respuesta = formulariosModelo::mdlSRegistros($tabla);
				return $respuesta;
			}
	//Listar registros

	//Listar registro
			public function ctrSRegistro($item,$valor){

				$tabla = 'registros';
				$respuesta = formulariosModelo::mdlSRegistro($tabla,$item,$valor);
				return $respuesta;
			}
	//Listar registro

	//Login
		public function ctrIngreso(){
			if (isset($_POST['ingEmail'])) {
				$tabla = 'registros';
				$item = 'email';
				$valor = $_POST['ingEmail'];
				$respuesta = formulariosModelo::mdlLogin($tabla,$item,$valor);
				//print_r($respuesta);
				if ($respuesta['email'] == $_POST['ingEmail'] && $respuesta['password'] == $_POST['ingPassword']) {
					//echo '<div class="alert alert-success">ingreso exitoso</div>';
					$_SESSION["validarIngreso"] = 'ok';
					echo '<script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}; window.location = "index.php?pagina=inicio";</script>';
				} else {
					echo '<script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
					echo '<div class="alert alert-warning">Ingreso no exitoso</div>';
				}
				

			}
		}			
	//Login

		//actualizar registro
		public function crtActRegistro(){
			if (isset($_POST['actNombre'])) {
				if ($_POST['actPassword'] != '') {
					$password = $_POST['actPassword'];
				} else {
					$password = $_POST['passActual'];
				}
				$tabla = 'registros';
				$datos = array("id"=>$_POST['idUsuario'],
								"nombre"=>$_POST['actNombre'],
								"email"=>$_POST['actEmail'],
								"password"=>$password);
				$respuesta = formulariosModelo::mdlActualizarRegistro($tabla,$datos);
					if ($respuesta = 'ok') {
echo '<script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
echo '<div class="alert alert-success">El usuario a sido actualizado</div>';
echo '<script>setTimeout(function(){window.location = "index.php?pagina=inicio"},3000);</script>';
					}
			} else {
				# code...
			}
			
		}
		//actualizar registro


//Eliminar registro
	public function crtEliminarRegistro(){
		if (isset($_POST['eliminarId'])) {
			$tabla = 'registros';
			$valor = $_POST['eliminarId'];
			$respuesta = formulariosModelo::mdlEliminarRegistro($tabla,$valor);
								if ($respuesta = 'ok') {
echo '<script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
echo '<div class="alert alert-danger">El usuario a sido Borrado</div>';
echo '<script>setTimeout(function(){window.location = "index.php?pagina=inicio"},500);</script>';
					}
		} else {
			# code...
		}
		

	}

//Eliminar registro


	}

?>