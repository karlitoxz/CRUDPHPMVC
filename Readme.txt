Readme
	CRUD POO MVC

	Kit font awesome:
		<script src="https://kit.fontawesome.com/86f7407bc6.js" crossorigin="anonymous"></script>

		forma en que se instancia la clase de metodo NO estatico:
		No se puede reutilizar en la vista. (echo)
		$registro = new ControladorFormularios();
		$registro ->ctrRegistro();

		forma en que se instancia la clase de metodo ESTATICO:
		Se puede reutilizar en la vista. (return)
		$registro = ControladorFormularios::ctrRegistro();
		echo $registro;

		https://www.youtube.com/watch?v=WdTx3DRSWYU&ab_channel=TutorialesatuAlcance
		28:42
		https://www.youtube.com/watch?v=8HGvj2w88vE&ab_channel=TutorialesatuAlcance


