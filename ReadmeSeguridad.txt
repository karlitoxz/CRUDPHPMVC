Para añadir seguridad en modelos PHP, usar PDO: 
	<?php 

		Class ConexionMysql{

			static public function conectarMysql(){

				//parametros PDO ("nameserver;basededatos","usuario","contraseña")
				$link = new PDO("mysql:host=localhost;dbname=basededatos","root","");
				$link ->exec("set names utf8");
				//Previene la emulacion,injectionSQL
				$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				return $link;
			}

		}

		//Realizar consultas con prepare:

	static public function mdlListarRegistros($idRegistro){
			$stmt = ConexionMysql::conectarMysql()->prepare("SELECT * FROM tabla WHERE idInternoRegistro = :idRegistro");

			$stmt -> bindParam(":idRegistro", $idRegistro,PDO::PARAM_STR);

			if ($stmt->execute()) {
				return $stmt->fetch();
			}else{
				print_r(ConexionMysql::conectarMysql()->errorInfo());
			}
			$stmt = null;
	}


		//En el controlador filtrar los parametros INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER, INPUT_ENV	:

		if(isset($_POST['idRegistro'])){
		//https://www.php.net/manual/es/filter.filters.sanitize.php
		$registroDigitado = filter_input(INPUT_POST, 'idRegistro', FILTER_SANITIZE_SPECIAL_CHARS);
		$resp =  registros::mdlListarRegistros($registroDigitado);
		echo $resp;
}		
	?>

	----------------------------------------------------------------------------------------------------
	Algoritmos soportados por PHP:
		https://www.php.net/manual/es/function.hash-algos.php

		Ejemplo para guardar un archivo (algoritmo crc32):

			$cantFiles = 5;

			for ($i=0; $i < $cantFiles  ; $i++) {
				$newName = explode(".",$_FILES['files']["name"][$i]);
				//El nombre del archivo sera el indice [0] y la extencion [1]
				$file_names[$i] = crc32($newName[0]).".".$newName[1];
				$tmpFilePath[$i] = $_FILES['files']['tmp_name'][$i];
				move_uploaded_file($tmpFilePath[$i], $ubicacionArchivo.$file_names[$i]);
			}