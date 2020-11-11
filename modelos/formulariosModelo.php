<?php 

	require_once "conexion.php";

class formulariosModelo{

	//Registro________________

	static public function mdlRegistro($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, email, password) VALUES (:nombre, :email, :password)");

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

		if ($stmt->execute()) {
			return $stmt->fetchAll();
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt = null;
	}
	//Listar Registros________________

	//Login________________
		
	static public function mdlLogin($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha FROM $tabla where $item = :$item");

		$stmt -> bindParam(":".$item, $valor,PDO::PARAM_STR);

		if ($stmt->execute()) {
			return $stmt->fetch();
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt = null;
	}
	//Login________________






} 
?>