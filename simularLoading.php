<?php 

				while (($datosRecorrer = fgetcsv($archivo, ",")) == true) 
				{
				//nombre para los pdf
				$nit = preg_replace("/[^0-9]+/", '', $datosRecorrer[1]);
				$fecha = date("Ymd");
				$nombrepdf = $fecha." - ".$nit.".pdf";
				//nombre para los pdf
				$file_id = preg_replace("/[^0-9]+/", '', $datosRecorrer[0]);
				$fileDownloaded = controladorDescargas::ctrDescargarPDFAPI($file_id);
				
				  //dejar el archivo descargado en la carpeta
				  	file_put_contents($ubicacionArchivo.$nombrepdf, $fileDownloaded);
				  	chmod($ubicacionArchivo.$nombrepdf, 0777);

				  //Vaciar el buffer simular loading php barra de progreso
				  	print "¤";
					ob_flush();
					flush();
				}
class controladorDescargas{

	//Descargar pdf desde la api archivo-------------------------------------------------------------------------------------
	static public function ctrDescargarPDFAPI($file_id){
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://pagina.net/cgi-bin/api.cgi',
			  CURLOPT_SSL_VERIFYPEER => false,
			  CURLOPT_SSL_VERIFYHOST => false,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS => "action=download&user=usuario&password=contraseña&file_id=$file_id",
			  CURLOPT_HTTPHEADER => array('Content-Type: application/pdf'),
			));

			$response = curl_exec($curl);

			if ($response) {
				curl_close($curl);
				return $response;
			}else{
				echo curl_error($curl);
				curl_close($curl);
			}

	}
	//Descargar pdf desde la api archivo-------------------------------------------------------------------------------------

}

?>