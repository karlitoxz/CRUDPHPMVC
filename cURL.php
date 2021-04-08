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

*/
?>

<?php 
class SubirFilesLHCFiles
{  



   static public function subirArchivosLHCAPI($archivos, $num_id){

   $archivos = $_FILES["files"];
   $num_id = filter_input(INPUT_POST, 'num_id', FILTER_SANITIZE_NUMBER_INT);

   $rutaAPI_LCH = 'https://'.$_SERVER["SERVER_NAME"].'/livehelper/index.php/restapi/file';

   $username = 'user';
   $password = 'pass';

      $ch = curl_init();
      
      curl_setopt($ch, CURLOPT_URL, $rutaAPI_LCH);
         //autenticacion:
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
         curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
         //SSL
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
         //options
         curl_setopt($ch, CURLOPT_MAXREDIRS, 10); 
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
         curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

       $cfile = new CURLFile($archivos['tmp_name'], $archivos['type'], $archivos['name']);

      $data = array('files' => $cfile, 'num_id'=> $num_id);
      echo '<pre>'; print_r($data); echo '</pre>';
      
      curl_setopt($ch, CURLOPT_POST,1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

      // Execute the handle
  $respuesta = curl_exec($ch);
  echo '<pre>'; print_r($respuesta); echo '</pre>';

     if ($respuesta == true) {
         echo "Success";
     }else{
         echo "Error". curl_error($ch);
     }
   }
}

 ?>