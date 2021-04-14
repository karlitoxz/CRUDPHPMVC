Crear formularios Bootstrap online:

https://bootstrapformbuilder.com/
-------------------------------------------------------------------------------------------------------------------------------
	Añadir multiples archivos a un input file:
		<form enctype='multipart/form-data' method='POST' action='javascript: myFuncion(); // submitFormTo.php'> 
			<input type='file' name='files[]' multiple />
			<button type='submit'>Submit</button>
		</form>

		example:
		HTML:
		<div class="item form-group">
			<div class="col-md-12 col-md-offset-3">
				<label for="file"><h3> Archivos</h3></label>
				<input placeholder="selecciona tu archivo" name="file[]" multiple id="file" type="file"  accept="image/jpeg,image/png,application/pdf">
				<span class="form_hint"> - Formatos aceptados .jpg, .png, .pdf</span>

				<input type="hidden" id="cant_files" name="cant_files" value="">
			</div>
		</div>

		<div class="descripcion_files"></div>
		JS:
			  $("#file").change(function (){
		       $(".descripcion_files").empty();
		       var count_files = $(this).get(0).files.length;
		       //alert(count_files);
		            $('#cant_files').val(count_files);
		        for (var i = 0; i < count_files; i++) {
		           $(".descripcion_files").append("<div class='item form-group'><label for='escolaridad' class='control-label col-md-3 col-sm-3 col-xs-12'>"+$(this).get(0).files[i].name+"</label><div class='col-md-6 col-sm-6 col-xs-12'>"+add_select(i)+"</div></div>");

		        };
		     }); 

				//Funcion muestra un select al lado de cada Archivo con los tipos de documento

				 var add_select = function(i){
				      var datos = "<select required class='select2_single08 form-control' name='"+i+"'> \
				          <option value=''>Seleccione</option> \
				          <option value='contrato'>contrato</option> \
				          <option value='foto'>foto</option> \
				          <option value='hoja_de_vida'>hoja de vida</option> \
				          <option value='cedula'>cedula</option> \
				          <option value='seguridad_social'>Seguridad social</option> \
				      </select> \
				      <br>";  
				      return datos;
				    }
				//Funcion muestra un select al lado de cada Archivo con los tipos de documento
		PHP:
			$num = $_REQUEST['cant_files'];
			$nom = $_REQUEST['nombre'];
				for ($i=0; $i < $num ; $i++) { 

				$tmpFilePath = $_FILES['file']['tmp_name'][$i];
		  			//Asegúrate de tener una ruta de archivo
				  if ($tmpFilePath != ""){
				    //Configura nuestra nueva ruta de archivo
				    	 $type_document = $_REQUEST[$i]; 
				    	 $destino = "../archivos/$type_document/";
					     $file_name = $_FILES['file']['name'][$i];
					     $sql02 .= "INSERT INTO tablaDestino (user_id, nombre_adjunto, tipo_documento, fecha) VALUES ($user_id,'$file_name','$type_document','$fecha');";
					     move_uploaded_file($tmpFilePath, $destino.$file_name);
					    //Sube el archivo al directorio temporal
					   
					}
				}

		Contar la cantidad de archivos que vienen:
		
			if (isset($_FILES)) {
				print_r(count($_FILES['filesP08']["name"]));
				//var_dump($_FILES);
			}


--------------------------------------------------------------------------------------------------------------------------

Prevenir el envio de un formulario:

En la cabecera del formulario:

<form name="formP02" action="javascript: myFunction();">

OR

<form class="p-5 bg-light" name="formulario" id="formulario" method="post" action="" onsubmit="return myFunction()">


añadir el tipo: button
	<button name="recoverSubmit" type="button" id="recoverSubmit" class="btn btn-lg btn-primary btn-block azulServ">Restablecer la contrase&ntilde;a</button>

	OR

	<button type="button" id="btnP02" onclick="myFunction()" class="btn btn-primary float-right">Enviar</button>

--------------------------------------------------------------------------------------------------------------------------
Crear y enviar formulario con campos, archivos y campos personalizados por AJAX.

JS:

	function enviarFormulario(){
		
	//Enviar formulario al controlador
		var Data = new FormData();
		//Form data
			var form_data = $('#formulario').serializeArray();

			for (var value of form_data.values()) {
				console.log(value.value);
			}

			$.each(form_data, function (key, input) {
				Data.append(input.name, input.value);
			});

		//File data
			var file_data = $('#files')[0].files;
			for (var i = 0; i < file_data.length; i++) {
			    Data.append("files[]", file_data[i]);
			}
		//Custom data
				Data.append('formulario', 'formularioJuan');
		 $.ajax({
			type: 'POST', 	
			url: "controladores/formulariosControlador.php",
			data: Data,
			dataType: 'json',
			processData: false,
	    	contentType: false,
	    	beforeSend: function() {$('#loading').show();},
			})
		  .done(function( result ) {
		 	$('#loading').hide();
	 	 	console.log("datos enviados: ", Data);
		  	console.log("datos recibidos: ", result);
		  	if (result.respuesta == 'error'){
		  		alert(result.mensaje);
		  	}else{
		  		setTimeout(function(){ alert(result.mensaje); }, 200);
		  	}

	  	});
	//Enviar formulario al controlador
	}

PHP Controlador:


	static public function ctrFormulario(){

		$comentarios = filter_input(INPUT_POST, 'comentarios', FILTER_SANITIZE_STRING);

	//Validacion de archivos:
			$tiposAdminitidos = array('image/jpeg', 'application/pdf');
			$archivosValidaciones = $_FILES['files']['type'];
			$resultado = count(array_diff($archivosValidaciones, $tiposAdminitidos));
	//Validacion de archivos:
		if ($resultado > 0) {
			$respuesta = array("respuesta"=>"error", "mensaje"=>"Recuerde solo se admiten archivos JPG y PDF");
			return $respuesta;
			} else {
		//Subir y guardar archivos validados
			$micarpeta = date('FY');
			
			if (!file_exists('../vistas/dist/uploads/'.$micarpeta)) {
			    mkdir('../vistas/dist/uploads/'.$micarpeta, 0777);
			}
			$ubicacionArchivo = ('../vistas/dist/uploads/'.date('FY').'/');

			$cantFiles = count($_FILES['files']["name"]);

			$file_names = array();

			for ($i=0; $i < $cantFiles  ; $i++) {
				$newName = explode(".",$_FILES['files']["name"][$i]);
				$tmpFilePath[$i] = $_FILES['files']['tmp_name'][$i];
				$file_names[$i] = hash_file('md5',$tmpFilePath[$i]).".".strtolower(end($newName));
				move_uploaded_file($tmpFilePath[$i], $ubicacionArchivo.$file_names[$i]);
			}

			$datos = array ("comentarios" => $comentarios,
							"cantFiles" => $cantFiles,
							"ubicacionArchivo" => $ubicacionArchivo);
			array_push($datos, array($file_names));

			$respuesta = guardarMysqlModelo::mdlGuardarenBD($datos);

			return $respuesta;	
		//Subir y guardar archivos validados
		}

	}

	//AutoLoad Ajax---
		if(isset($_POST['formulario']) && $_POST['formulario'] == 'formularioJuan'){
			$resp =  controladorFormularios::ctrFormulario();
		echo json_encode($resp);
		}


	PHP Modelo:

	static public function mdlGuardarenBD($datos){
		$stmt = ConexionMysql::conectarMysql()->prepare("INSERT INTO tabla (nombreArchivo, ubicacionArchivo, comentarios) VALUES (::nombreArchivo, :ubicacionArchivo, :comentarios)");

		$cantFiles = $datos["cantFiles"];
		$result = array();

		for ($i=0; $i < $cantFiles ; $i++) { 
			
			$nombreArchivo = $datos[0][0][$i];
			$stmt -> bindParam(":nombreArchivo",$nombreArchivo,PDO::PARAM_STR);
			$stmt -> bindParam(":ubicacionArchivo",$datos["ubicacionArchivo"],PDO::PARAM_STR);
			$stmt -> bindParam(":comentarios",$datos["comentarios"],PDO::PARAM_STR);
			
				if ($stmt->execute()) {
					$result = array("respuesta"=> "ok") ;
				}else{
					print_r(ConexionMysql::conectarMysql()->errorInfo());
				}
		}
		return $result;	
		$stmt = null;
	}

PHP conexion:

		Class ConexionMysql{

			static public function conectarMysql(){

				//parametros PDO ("nameserver;basededatos","usuario","contraseña")
				$link = new PDO("mysql:host=localhost;dbname=dbtest","root","");
				$link ->exec("set names utf8");
				$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				return $link;
			}

		}

			/*$stmt = ConexionMysql::conectarMysql()->prepare("SELECT * FROM tabla");
			if ($stmt->execute()) {
				var_dump($stmt->fetchAll()) ;
			}else{
				print_r(ConexionMysql::conectarMysql()->errorInfo());
			}*/


--------------------------------------------------------------------------------------------------------------------------

Filtrar inputs o variables:

$comentarios = filter_input(INPUT_POST, 'comentarios', FILTER_SANITIZE_STRING);
//filtrar una variable: 

$file_id = filter_var($datos[0], FILTER_SANITIZE_NUMBER_INT);
print_r($file_id);
