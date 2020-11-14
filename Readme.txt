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

		Utilizar constantes dentro de una clase:
			const FILTERNAME = '/^[ a-zA-ZáéíóúÁÉÍÓÚ]+$/';
			preg_match(self::FILTERNAME, $_POST['regNombre']

		Subir a github: git push origin master

		https://www.youtube.com/watch?v=WdTx3DRSWYU&ab_channel=TutorialesatuAlcance
		https://www.youtube.com/watch?v=8HGvj2w88vE&ab_channel=TutorialesatuAlcance
		https://www.youtube.com/watch?v=X6myYinstqA&ab_channel=TutorialesatuAlcance
		https://www.youtube.com/watch?v=-KafvnlaU08&ab_channel=TutorialesatuAlcance
		https://www.youtube.com/watch?v=SievkPbDz30&ab_channel=TutorialesatuAlcance
		0:16

		Seguridad Informatica XSS:
		preg_match(pattern, subject)
		EXPRESIONES REGULARES PHP:https://diego.com.es/expresiones-regulares-en-php
		en el archivo index.php no cerrar la etiqueta de php '?>'

		Seguridad Informatica CSRF: token
		md5(string);

		Seguridad Informatica CSRF: SQL Injection:
		1.preg_match
		2.PDO::PARAM_STR
		3..htaccess

		Encrytar contraseña:
		if (CRYPT_BLOWFISH == 1) {
			    echo 'Blowfish:     ' . crypt('rasmuslerdorf', '$2a$07$usesomesillystringforsalt$') . "\n";
			}




