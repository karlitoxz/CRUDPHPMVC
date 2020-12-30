Recorrer y extraer DIVs:

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

</head>
<body>

   <div class="direct-chat-messages" id="ajaxchat">

	   	<div class="direct-chat-msg">
	   		Text Test 1
	   	</div>

	   	<div class="direct-chat-msg">
	   		Text Test 2
	   	</div>

	   	<div class="direct-chat-msg">
	   		Text Test 3
	   	</div>

	   	<div class="direct-chat-msg right">
	   		Text Test 4
	   	</div>

    </div>
    <br>Respuesta<br>
    <div id="testHistory"></div>

<script src="validacion/dist/js/jquery.min.js"></script>
<!-- <script src="js/recorrer.js"></script> -->
	<script>
		$(document).ready(function() {
			console.log('Ready...');
			setTimeout(function(){ recorrerdiv(); }, 1000);
		});
			function recorrerdiv() {
				console.log('recorrerdiv');
					var dialogo = [];
					    $(".direct-chat-msg").each(function(index,element){
					    	//console.log(index);
					    	//console.log(element);
			    	     	 if( $(this).hasClass('right') ){
			    	     	 	text = $(this).text();
			        			dialogo.push('-> Usuario: '+text+'<br>');
			      			}else{
			    	     	 	text = $(this).text();
			        			dialogo.push('-> Serviefectivo: '+text+'<br>');
			      			}
			        	});
			    $('#testHistory').append(dialogo);
			}
	</script>	
</body>
</html>
--------------------------------------------------------------------------------------------------------------------------					
jquery asociar eventos a elementos html creados dinamicamente:

		https://www.arumeinformatica.es/blog/jquery-asociar-eventos-a-elementos-html-creados-dinamicamente/
			example:
				$(document).ready(function() {
					//Ready---------------------------------
						$("#elementoPadre").on("change", "#elementoDinamico", function(){
							alert('Hola');
						});

						$(document).on("change", "#elementoDinamico", function(){
							alert('Hola');
						});
					//Ready---------------------------------
				});
--------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------
Validar formularios desde Jquery con Regex - Expresiones regulares

if (claveSeguridad.match(/(SERV-[0-9]{4,4})$/)) {

}

contraseña de 8 caracteres minimo una minuscula y un numero 
if (password.match("^(?=.*[0-9])(?=.*[a-z])([a-zA-Z0-9]{8,})$")) {
}

contraseña de 8 caracteres minimo una minuscula una Mayuscula y un numero 
if (password.match("^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$")) {
}


-----------------------------------------------------------------------------------------------------------------------------
Avandonar una funcion antes de tiempo:

	function contar(){
		var exit = false;

			for (i = 0; i < 10; i++) {
	 			if(i == 5){
	 				exit = true;
	 			}
			}	

		if (exit == true) {
		 return false;
		}
			
		console.log('Este texto no se mostrara');
	}

------------------------------------------------------------------------------------------------------------------------------

personalizar una funcion con comodin para varios formularios:

//Funciones ala espera de una accion en formularios---------------
	$("#ajaxformulario").on("change","[id^=files]", function(){
		$("[id^=filesdes]").empty();
		var count_files = $(this).get(0).files.length;
			for (var i = 0; i < count_files; i++) {
				$("[id^=filesdes]").append($(this).get(0).files[i].name+" - ");
			};
	});

-------------------------------------------------------------------------------------------------------------------------------
Activar los menus de un NAV - ADMIN LTE

function menuActive(){
	/** add active class and stay opened when selected */
	var url = window.location;

	// for sidebar menu entirely but not cover treeview
	$('ul.nav-sidebar a').filter(function() {
	    return this.href == url;
	}).addClass('active');

	//for treeview
	$('ul.nav-treeview a').filter(function() {
	    return this.href == url;
	}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
}

-------------------------------------------------------------------------------------------------------------------------------