<?php 

	require_once "conexion.php";

class formulariosModelo{

	//Registro________________

	static public function mdlRegistro($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (token, nombre, email, password) VALUES (:token, :nombre, :email, :password)");

		$stmt -> bindParam(":token",$datos["token"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":email",$datos["email"],PDO::PARAM_STR);
		$stmt -> bindParam(":password",$datos["password"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt = null;
	}
	//Registro________________

	//Listar Registros________________
		
	static public function mdlSRegistros($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha FROM $tabla");

			$resultQuery = $stmt->execute();
																  
		if ($resultQuery == 1) {
			$rowCount = $stmt->rowCount();
				if ($rowCount > 0) {
					return $stmt->fetchAll();
				}else{
					return $result = array("respuesta"=> "error", "mensaje" => "No se encontraron archivos en ese múmero de chat") ;
				}
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt = null;
	}
	//Listar Registros________________

	//Listar registro____________________
	static public function mdlSRegistro($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha FROM $tabla where $item = :valor");

		$stmt -> bindParam(":valor", $valor,PDO::PARAM_STR);

		$resultQuery = $stmt->execute();
																  
		if ($resultQuery == 1) {
			$rowCount = $stmt->rowCount();
				if ($rowCount > 0) {
					return $stmt->fetchAll();
				}else{
					return $result = array("respuesta"=> "error", "mensaje" => "No se encontraron archivos en ese múmero de chat") ;
				}
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt = null;
	}
	//Listar registro____________________

	//Login________________
		
	static public function mdlLogin($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha FROM $tabla where $item = :valor");

		$stmt -> bindParam(":valor", $valor,PDO::PARAM_STR);

		$resultQuery = $stmt->execute();
															  
		if ($resultQuery == 1) {
			$rowCount = $stmt->rowCount();
				if ($rowCount > 0) {
					return $stmt->fetchAll();
				}else{
					return $result = array("respuesta"=> "error", "mensaje" => "No se encontraron archivos en ese múmero de chat") ;
				}
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt = null;
	}
	//Login________________

	//actualizar registro___________________
		
		static public function mdlActualizarRegistro($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET token = :newToken, nombre = :nombre, email = :email, password = :password WHERE token = :token");

		$stmt -> bindParam(":newToken",$datos["newToken"],PDO::PARAM_STR);
		$stmt -> bindParam(":token",$datos["token"],PDO::PARAM_STR);
		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":email",$datos["email"],PDO::PARAM_STR);
		$stmt -> bindParam(":password",$datos["password"],PDO::PARAM_STR);
		


		if ($stmt->execute()) {
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt = null;
	}

	//actualizar registro___________________

	//Eliminar registro___________________

	
		static public function mdlEliminarRegistro($tabla,$valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token = :valor");

		$stmt -> bindParam(":valor", $valor,PDO::PARAM_INT);

		if ($stmt->execute()) {
			return 'ok';
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt = null;
	}

	//Eliminar registro___________________

	//actualizar intentos Fallidos___________________
		
		static public function mdlActualizarIntentos($tabla,$valor,$token){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos_fallidos = :intentos_fallidos WHERE token = :token");

		$stmt -> bindParam(":intentos_fallidos",$valor,PDO::PARAM_INT);
		$stmt -> bindParam(":token",$token,PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt = null;
	}

	//actualizar intentos Fallidos___________________




} 
?>