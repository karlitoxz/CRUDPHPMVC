Layout AJAX:

$.ajax({
	url: '/path/to/file',
	type: 'POST',
	//dataType: 'json', -Activar cuando se esperan datos JSON
	data: {param1: 'value1'},
	//processData: false, -Habilitar para enviar Adjuntos($_FILES)
	//contentType: false,
	//beforeSend: function() {alert('cargando..');}, -Gif carga
})
.done(function(data) {
	console.log("data", data);
})
.fail(function(jqXHR, textStatus, errorThrown) {
			console.log("errorThrown", errorThrown);
			console.log("textStatus", textStatus);
			console.log("jqXHR", jqXHR);
			console.log("error");
});

----ajax --- async/await---

	async function doAjax(args) {
	    const result = await $.ajax({
	        url: ajaxurl,
	        type: 'POST',
	        data: args
	    });

	    return result;
	}

----ajax --- async/await--- mostrando errores:

	async function doAjax(args) {
	    let result;

	    try {
	        result = await $.ajax({
	            url: ajaxurl,
	            type: 'POST',
	            data: args
	        });

	        return result;
	    } catch (error) {
	        console.error(error);
	    }
	}


Llamar a la funcion:

	1. const stuff = await doAjax();
	2. doAjax().then( (data) => doStuff(data) ) // forma de promesa

----------------------------------------------------------------------------------------------------------------

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

email:---

	email = $('#email').val();

	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if (filter.test(email)) {
	 	$('#errorEmail').empty();
	}
	else{
		console.log('Email NO valido');
		$('#errorEmail').empty().append("<strong>Error: </strong> La dirección de correo ingresada no es valida.").show();
		$('#email').empty().focus();
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

comprimir un JS minify

	https://github.com/terser/terser
	
		npm install terser -g
		terser -c -m -- chat.js > terser_chat.js
-------------------------------------------------------------------------------------------------------------------------------

Subir una imgen solo por ajax
$(document).ready(function(){

    $("#but_upload").click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files;
        
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: 'upload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image element
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
    });
});

----------------------------------------------------deshabilitar botones y formulario con jquery-------------------------------------------------
		$(':input').prop('disabled', true);
		$('#btnConsultar').prop('disabled', true);
		->
		$('#btnConsultar').removeAttr("disabled");
			//habilitar todos los input execpto uno:
		$(':input').not('#nitsConsultar').removeAttr("disabled");
		
		//div con clases oculta:
			$("#gifCarga").toggleClass('d-none');
				<div id="gifCarga" class="col-6 text-center d-none">
    					<img src="./dist/img/GifServiefectivo60x74.gif" alt="Cargando...">
    				</div>
