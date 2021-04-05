<?php

error_reporting(0);

Class Archivo01{
	static public function preparacion($archivos){

		//Validacion de archivos		
			$tiposAdminitidos = array('image/jpeg', 'application/pdf');
			$archivosValidaciones = $archivos['type'];
			$resultado = count(array_diff($archivos, $tiposAdminitidos));
			$cantFiles = count($archivos["name"]);
		//Validacion de archivos
		if ($resultado > 0) {
			$respuesta = Archivo02::subir($archivos, $cantFiles);
		}else{
			$respuesta = array("respuesta"=>"error", "mensaje"=>"<span style='color: red;'>Es necesario el envió de archivos.</span>");
		}
		return $respuesta;
	}

}

Class Archivo02{
	static public function subir($archivos, $cantFiles){

			$micarpeta = date('FY');
			if (!file_exists('./uploads/'.$micarpeta)) {
			    mkdir('./uploads/'.$micarpeta, 0777);
			}

			$ubicacionArchivo = ('./uploads/'.date('FY').'/');
		//Subir archivos
			for ($i=0; $i < $cantFiles  ; $i++) {
				$newName = explode(".",$archivos["name"][$i]);
				$tmpFilePath[$i] = $archivos['tmp_name'][$i];
				$file_names[$i] = hash_file('md5',$tmpFilePath[$i]).".".strtolower(end($newName));
				move_uploaded_file($tmpFilePath[$i], $ubicacionArchivo.$file_names[$i]);
				$fileSuccess = $ubicacionArchivo.$file_names[$i];
			}
		//Subir archivos
			if (file_exists($fileSuccess)) {
			   $respuesta = array("respuesta"=>"ok", "mensaje"=>"<span style='color: blue;'>Archivos subidos con exito.</span>", "http_response_code"=>200);
			}else{
				$respuesta = array("respuesta"=>"error", "mensaje"=>"<span style='color: red;'>Ocurrio un error al subir los archivos.</span>");
			}
			return $respuesta;
	}

}


//autoload ajax
if (isset($_FILES["archivos"])) {
	$archivos = $_FILES["archivos"];
	$resp = Archivo01::preparacion($archivos);
	echo json_encode($resp, JSON_INVALID_UTF8_IGNORE);
}

?>

<form enctype='multipart/form-data' method="post">
	<input  type="file" name="archivos[]" multiple>
	<br>
	<button type="submit">Enviar</button>
</form>

