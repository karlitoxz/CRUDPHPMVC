------------------------------------HTML-----------------------------------------
<!-- DataTables CSS -->
  <link rel="stylesheet" href="./vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="./vistas/plugins/datatables/dataTables.dateTime.min.css">
<!-- DataTables JS-->
<script src="./vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./vistas/plugins/datatables/dataTables.dateTime.min.js"></script>
<script src="./vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./vistas/plugins/datatables-buttons/js/jszip.min.js"></script>

<script src="vistas/plugins/moment/moment.min.js"></script>
<script src="vistas/dist/js/miArchivo.js?v=5"></script>

<table border="0" cellspacing="5" cellpadding="5">
  <tbody>
    <tr>
      <td>Fecha inicial:</td>
      <td><input type="text" id="min" name="min"></td>
    </tr>
    <tr>
      <td>Fecha final:</td>
      <td><input type="text" id="max" name="max"></td>
    </tr>
  </tbody>
</table>
<br>
        <table id="tblInforme" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NITENT</th>
                    <th>RAZSOC</th>
                    <th>FECHA</th>
                    <th>RESPUE</th>
                    <th>CODEFE</th>
                    <th>OBSERV</th>
                    <th>USUARIO</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- Se llena por medio de dataTables miArchivo.js -->
                  </tbody>
          </table>

------------------------------------JS-----------------------------------------
var minDate, maxDate;
$(document).ready(function() {
	console.log('miArchivo.js');
	 // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY-MM-DD'
    });

	TraerDataTable();
    table = $('#tblInforme').DataTable();
	
 	$('#min, #max').on('change', function () {
 		filtrarTabla();
 		table.draw();
    });
	
});

//Traer dataTable -----------------------
function TraerDataTable(){

	var table = $('#tblInforme').DataTable({
		"destroy":true,
		dom: 'Bfrtip',
		buttons: ['copy', 'excel'],
		"order": [[ 2, "asc" ]],
		"pageLength": 40,
		"lengthMenu": [[40, 80, 100, -1], [40, 80, 100, "All"]],
		"language": {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
		"ajax":{
			"method":"POST",
			"url": "./controladores/Controlador.php",
			"data": {"reporte": "TraerReporte"},
			"dataSrc":""
		},
		"columns":[
			{"data":"NITENT"},
			{"data":"RAZOC"},
			{"data":"FECHA", render: function (data, type, row, meta) {
					console.log(row);
					data = moment(data, "YYYY-MM-DD").format("YYYY-MM-DD");
			   		return data;
       		 	}
       		},
			{"data":"RESPUE"},
			{"data":"CODEFE"},
			{"data":"OBSERV"},
			{"data":"USUARI"},
		]
	});

}

//Traer dataTable -----------------------

function filtrarTabla(){
	//Funcion filtrar tabla por fecha
	$.fn.dataTable.ext.search.push(
	    function( settings, data, dataIndex ) {
	        var min = $('#min').val();
	        var max = $('#max').val();
	      	if (max == '') {
	      		max = $('#min').val();
	      	}
	        var date = data[2];

	        if (
	            ( min === null && max === null ) ||
	            ( min == "" && max == "" ) ||
	            ( min === null && date <= max ) ||
	            ( min <= date   && max === null ) ||
	            ( min <= date   && date <= max )
	        ) {
	            return true;
	        }
	        return false;
	    }
	);
}

------------------------------------Controlador-----------------------------------------

require_once '../modelos/as400Modelos.php';

class controladorConsulta{

	//Listar detalles para reporte -----------------------------

		static public function ctrReporteGestion(){

				$respuesta = as400Modelo::mdlReporteGestion();
				if ($respuesta) {
				} else {
					$respuesta = false;
				}
				return $respuesta;
			}
	//Listar detalles para reporte -----------------------------


	if(isset($_POST['reporte']) && $_POST['reporte'] == 'TraerReporte'){
		$resp = controladorConsulta::ctrReporteGestion();
		echo json_encode($resp, JSON_INVALID_UTF8_IGNORE);
	}
}

------------------------------------Modelo consulta con array-----------------------------------------

require_once "conexion.php";
		
 static public function mdlReporteGestion(){

 	$USUARIarray = usuariosModelo::mdlTraerDistintosUsuarios();
 	$NITENTarray  = chatModelo::mdlTraerNitsChatGestionados();

		$USUARI = "'".implode("','",$USUARIarray)."'";
		$NITENT = implode(", ",$NITENTarray);

		$stmt = Conexion::conectarMysql()->prepare("SELECT B.nitent, upper(A.RAZSOC) as RAZOC, upper(B.respue) as RESPUE, B.fecha, B.codefe, upper(concat(B.observ, B.observ1)) as observ, B.usuari as usuari FROM BASE.Tabla1 B INNER JOIN BASE.Tabla2 A ON B.NITENT = A.NITENT WHERE B.NITENT in (".$NITENT.") and usuari in (".$USUARI.") AND B.FECHA >= '20210316' order by B.fecha asc");

		$result =  $stmt->execute();

		if ($result) {
			return $stmt->fetchAll();
		}else{
			print_r(Conexion::conectarMysql()->errorInfo());
			return false;
		}
		$stmt = null;
	}


------------------------------------Modelo conexion-----------------------------------------

	Class Conexion{

		static public function conectarMysql(){

			//parametros PDO ("nameserver;basededatos","usuario","contraseña")
			$link = new PDO("mysql:host=localhost;dbname=BASE","root","");
			$link ->exec("set names utf8");
			$link ->exec("set lc_time_names = 'es_CO'");
			$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			return $link;
		}

	}
