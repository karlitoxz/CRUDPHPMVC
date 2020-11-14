<?php  
	
	class ControladorFormularios{

		const FILTERNAME = '/^[ a-zA-ZáéíóúÁÉÍÓÚ]+$/';
		const FILTEREMAIL = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i';

	//Registro
		public function ctrRegistro(){
			if (isset($_POST['regNombre'])) {
				if (preg_match(self::FILTERNAME, $_POST['regNombre']) &&
					preg_match(self::FILTEREMAIL, $_POST['regEmail'])){
					$tabla = 'registros';
					$token = md5($_POST['regNombre']."+".$_POST['regEmail']);

					$datos = array("token"=>$token,
								"nombre"=>$_POST['regNombre'],
								"email"=>$_POST['regEmail'],
								"password"=>$_POST['regPassword']);

						$respuesta = formulariosModelo::mdlRegistro($tabla,$datos);
					return $respuesta;
				} else {
					$respuesta = "Error01";
					return $respuesta;
				}
				
			} else {
				$respuesta = "Error02";
				return $respuesta;
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

//Actualizar registro
		public function crtActRegistro(){
			if (isset($_POST['actNombre'])) {
				if (preg_match(self::FILTERNAME, $_POST['actNombre']) &&
					preg_match(self::FILTEREMAIL, $_POST['actEmail'])){
					$usuario = formulariosModelo::mdlSRegistro("registros","token",$_POST['tokenUsuario']);

				$valToken = md5($usuario['nombre']."+".$usuario['email']);

				if ($valToken == $_POST['tokenUsuario']) {
					if ($_POST['actPassword'] != '') {
						$password = $_POST['actPassword'];
					} else {
						$password = $_POST['passActual'];
					}
					$tabla = 'registros';

					$newToken = md5($_POST['actNombre']."+".$_POST['actEmail']);

					$datos = array("newToken"=>$newToken,
						"token"=>$_POST['tokenUsuario'],
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
					echo '<div class="alert alert-danger">El token no es valido</div>';
				}

			}else{
				echo '<div class="alert alert-warning">Caracteres invalidos</div>';
			}
		} else {
			//echo '<div class="alert alert-danger">No existe la variable</div>';
		}

	}
//Actualizar registro


//Eliminar registro
	public function crtEliminarRegistro(){

		if (isset($_POST['eliminarId'])) {

			$usuario = formulariosModelo::mdlSRegistro("registros","token",$_POST['eliminarId']);

			$valToken = md5($usuario['nombre']."+".$usuario['email']);

			if ($valToken == $_POST['eliminarId']) {
				$tabla = 'registros';
			$valor = $_POST['eliminarId'];
			$respuesta = formulariosModelo::mdlEliminarRegistro($tabla,$valor);
								if ($respuesta = 'ok') {
echo '<script>if (window.history.replaceState){window.history.replaceState(null, null, window.location.href)}</script>';
echo '<div class="alert alert-danger">El usuario a sido Borrado</div>';
echo '<script>setTimeout(function(){window.location = "index.php?pagina=inicio"},500);</script>';
					}
			} else {
				echo '<div class="alert alert-danger">El token no es valido</div>';
			}
			
		} else {
			//echo '<div class="alert alert-danger">No existe la variable</div>';
		}
		

	}

//Eliminar registro


	}

?>