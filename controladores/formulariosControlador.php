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

	}

?>