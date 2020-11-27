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
--------------------------------------------------------------------------------------------------------------------------				
	jquery asociar eventos a elementos html creados dinamicamente:
		example:
			$(document).ready(function() {
				//Ready---------------------------------
					$("#elementoPadre").on("change", "#elementoDinamico", function(){
						alert('Hola');
					});
				//Ready---------------------------------
			});
--------------------------------------------------------------------------------------------------------------------------
