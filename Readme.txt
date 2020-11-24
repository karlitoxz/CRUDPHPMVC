Readme
	CRUD POO MVC

	Kit font awesome:
		<script src="https://kit.fontawesome.com/86f7407bc6.js" crossorigin="anonymous"></script>

	CLASES PHP Generalidades:
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

		Utilizar variables dentro de una clase:
				private $table = 'chatdialogos';
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $this->table");

		Pedir datos desde Ajax a un controlador:
			<?php  
					include '../modelos/registrosModelo.php';
					class controladorregistros{

						//Listar registros
							static public function ctrSRegistros(){
									$respuesta = registrosModelo::mdlListarRegistros();
									return $respuesta;
								}
						//Listar registros
						
					}

					//AutoLoad Ajax
					if(isset($_POST['ctrSRegistros'])){
					      $respuesta =  controladorregistros::ctrSRegistros();
					      echo $respuesta;
					}
			?>
				 $.ajax({
						type: 'POST', 	
						url: "controladores/registrosControlador.php",
						data: {"traerRegistros": "traerRegistros"},
						})
					  .done(function( data ) {
					  	data = jQuery.parseJSON(data);
					  	console.log(data[0].dialogo);
				  });

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

	URL's amigables .htaccess:
		RewriteEngine On
		RewriteRule ^([-a-zA-Z0-9/]+)$ index.php?pagina=$1
		
			Menu cambiar:
				index.php?pagina=salir
				por:
				salir
				"Con rutas de mas de dos parametros no funciona."

	Decodificar JSON en PHP:
		01:JSON:
			$string = '{"nombre": "Angelina", "apellido": "Jolie"}';
			$resultado = json_decode($string);
			// Vemos el resultado de la decodificación:
			var_dump($resultado);
			/*
			* object(stdClass)[3]
			  public 'nombre' => string 'Angelina' (length=8)
			  public 'apellido' => string 'Jolie' (length=5)
			*/
			echo $resultado->nombre; // Angelina
			echo $resultado->apellido; // Jolie
		02:ARRAY ASOCIATIVO:
			$string = '{"nombre": "Angelina", "apellido": "Jolie"}';
			$resultado = json_decode($string, true);
			// Vemos el resultado de la decodificación:
			var_dump($resultado);
			/*
			* array (size=2)
			  'nombre' => string 'Angelina' (length=8)
			  'apellido' => string 'Jolie' (length=5)
			*/
			echo $resultado['nombre']; // Angelina
			echo $resultado['apellido']; // Jolie



