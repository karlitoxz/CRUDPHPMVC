<?php
	require_once "controladores/plantillaControlador.php";
	require_once "controladores/formulariosControlador.php";
	require_once "modelos/conexion.php";
	
	//instanciar objeto
		$plantilla = new controladorPlantilla();
		$plantilla -> ctrTraerPlantilla();
		$conexion = Conexion::conectar();
		print_r($conexion);

?>