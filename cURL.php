<?php 
	$rutaAPI_LCH = 'http://'.$_SERVER["SERVER_NAME"].'/livehelper/index.php/restapi/chats';
	$username = 'jromero';
	$password = 'jromeroPassword';

   $ch = curl_init();

   curl_setopt($ch, CURLOPT_URL, $rutaAPI_LCH);
   //autenticacion:
   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
	curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
   //SSL
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

   curl_setopt($ch, CURLOPT_HEADER, 0); 

   $data = curl_exec($ch); 

   curl_close($ch); 

   print($data);



/*

Petición POST
Enviamos datos a una URL destino.

<?php
    $fields = array('field1' => 'valor1', 'field2' => urlencode('valor 2'));
    $fields_string = http_build_query($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://url-de-la-web/test");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string );
    $data = curl_exec($ch);
    curl_close($ch);
?>
Explicación línea por línea:
//Inicializamos nuestro arreglo de valores
//Si nuestros valores contienen espacios o caracteres especiales
//podemos convertirlos mediante urlencode("valor");
$fields = array('field1' => 'valor1', 'field2' => urlencode('valor 2'));
//convertimos el arreglo en formato URL
$fields_string = http_build_query($fields);
//Abrimos la conexión cURL
$ch = curl_init();
//Configuramos mediante CURLOPT_URL la URL destino
curl_setopt($ch, CURLOPT_URL, "https://url-de-la-web/test");
//Indicamos que se trata de una petición POST con valor "1" o "true"
curl_setopt($ch, CURLOPT_POST, 1);
//Asignamos los campos a enviar en el POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string );
//Ejecuta la petición HTTP y almacena la respuesta en la variable $data.
$data = curl_exec($ch);
//Cierra la conexión cURL
curl_close($ch);

*/
?>