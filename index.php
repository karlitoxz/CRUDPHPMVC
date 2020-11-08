<?php
	require_once "controladores/plantillaControlador.php";
	require_once "controladores/formulariosControlador.php";
	
	//instanciar objeto
		$plantilla = new controladorPlantilla();
		$plantilla -> ctrTraerPlantilla();

?>