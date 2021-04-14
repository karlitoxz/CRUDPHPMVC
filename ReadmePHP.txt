Numeros a formato moneda:
	<?php 
		$fmt = new NumberFormatter( 'es_CO', NumberFormatter::CURRENCY );
		$number = 250000;
		$numberFormat = $fmt->formatCurrency($number, "COP")."\n";
		echo $numberFormat;
	?>

--------------------------------------------Subir y Leer un archivo csv----------------------------------

<?php
class controladorArchivos{

	//Subir archivo-------------------------------------------------------------------------------------
	static public function ctrSubirArchivo($file){

			//Validar Peso:
			$MAX_FILE_SIZE = 10000000;
				if ($file['size'] > $MAX_FILE_SIZE) {
					$err = "<div class='alert alert-danger' role='alert'>El peso del archivo no puede ser mayor a 10MB</div>";
					return $err;
				}
			//Validar Peso:

			//Validar la extencion
				if ($file['type'] != 'application/vnd.ms-excel') {
					$err = "<div class='alert alert-danger' role='alert'>El archivo debe tener una extencion .csv</div>";
					return $err;
				}
			//Validar la extencion

			//Crear carpeta para guardar archivo
				$micarpeta = date('FY');
				$archivo = date('YF_d').'.csv';
				if (!file_exists('./Uploads')) {
			    mkdir('./Uploads', 0777);
				}
				if (!file_exists('./Uploads/'.$micarpeta)) {
			    mkdir('./Uploads/'.$micarpeta, 0777);
				}
				$ubicacionArchivo = ('./Uploads/'.date('FY').'/');
			//Crear carpeta para guardar archivo

			//Guardar el archchivo en la carpeta
				$rutaArchivo = $ubicacionArchivo.$archivo;
				move_uploaded_file($file['tmp_name'], $rutaArchivo);
				if (file_exists($rutaArchivo)) {
					echo "<br><div class='alert alert-success' role='alert'>El archivo fue subido con exito. PASO 01 ok</div><br>";
				}else{
					$err = "<div class='alert alert-danger' role='alert'>El archivo no pudo ser subido.</div>";
					return $err;
				}
			//Guardar el archchivo en la carpeta

			//Leer el archivo 
			controladorArchivos::ctrLeerArchivo($rutaArchivo, $micarpeta);
			//Leer el archivo

	}
	//Subir archivo-------------------------------------------------------------------------------------

		//Subir archivo-------------------------------------------------------------------------------------
	static public function ctrLeerArchivo($rutaArchivo, $micarpeta){

			//Leer el archivo subido
				$linea = 0;
				//Abrimos nuestro archivo
				$archivo = fopen($rutaArchivo, "r");
				//Lo recorremos
				while (($datos = fgetcsv($archivo, ",")) == true) 
				{
				  $num = count($datos);
				  print_r($datos[0]);
				  //Recorremos las columnas de esa linea
				  for ($columna = 0; $columna < $num; $columna++) 
				      {
				         echo $datos[$columna] . "\n";
				     }
				}
				//Cerramos el archivo
				fclose($archivo);
			//Leer el archivo subido

	}
	//Subir archivo-------------------------------------------------------------------------------------




}
//AutoLoad Ajax-----------------------------------------------------

if(isset($_FILES['file'])){
	$file = $_FILES['file'];
	$resp =  controladorArchivos::ctrSubirArchivo($file);
	echo $resp;
}

?>

--------------------------------------------Subir y Leer un archivo csv----------------------------------