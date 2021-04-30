<?php 
	
	
	$casos = ["deuda01", "deuda02", "deuda03", "deuda04", "deuda05", "deuda06"];
	$mensajes = [];
	foreach ($casos as $key => $value) {
		$mensaje[$key] = $value;
	}

	$concatenar = "Esta es el caso: ";

	$mensajeReturn = "";
	$keys = array_keys($mensaje);

	foreach ($mensaje as $key => $value) {
		 if($key === end($keys)) {
    		print_r($value);
   			
  		}else{
  			print_r($value);
  			 echo " --- ";
  		}

		
	}



 ?>



<?php 
	
	
	$casos = ["deuda01", "deuda02", "deuda03", "deuda04", "deuda05", "deuda06"];
	$mensajes = [];
	foreach ($casos as $key => $value) {
		$mensaje[$key] = $value;
	}

	$concatenar = "Esta es el caso: ";

	$mensajeReturn = "";

	foreach ($mensaje as $key => $value) {
		 if($key != count($mensaje) - 1) {
    		print_r($value);
   			 echo " --- ";
  		}else{
  			print_r($value);
  		}

		
	}



 ?>