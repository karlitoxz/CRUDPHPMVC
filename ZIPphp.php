<?php 
 $zip = new ZipArchive;

	$filename = 'NombreDelZip'.date('dmY').'.zip';

	$dir = './Uploads/'.date('dFY').'/';

	$dir_open=opendir($dir);

  if ($zip->open($filename, ZIPARCHIVE::CREATE) !== TRUE){
      exit("cannot open <$filename>\n"); // puedes lanzar una excepción
  }

$files = array();

  while ($current = readdir($dir_open)){
    if( $current != "." && $current != "..") {
      if(is_dir($dir.$current)) {
        //  echo $dir.$current.'/';
      } else {
        //echo $current;
        $files[] = $current;
      }
    }
  }

	foreach($files as $file){
		$localfile = basename($file);
		//print_r($localfile);
	    $zip->addfile($dir.$file, $localfile); // las demás opciones por defecto
	}
$zip->close();


?>