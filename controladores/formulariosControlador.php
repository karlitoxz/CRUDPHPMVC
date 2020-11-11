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
					echo '<script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href); window.location = "index.php?pagina=inicio";}</script>';
				} else {
					echo '<script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
					echo '<div class="alert alert-warning">Ingreso no exitoso</div>';
				}
				

			}
		}			
	//Login
	}

?>