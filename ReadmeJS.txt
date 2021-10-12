-----------------------------------------------------------------------------------------------------------------------
Versionar java script para que refresque la proxima vez que se habar el archivo:

<script src="vistas/dist/js/chatDetalle.js?v=2"></script>

	se hacen cambios y 

<script src="vistas/dist/js/chatDetalle.js?v=3"></script>

	Con esto la proxima vez que cargue la pagina el la refrescara al usuario


-----------------------------------------------------------------------------------------------------------------------
Un archivo cargue como ultimo recurso
	
	<script src="vistas/dist/js/chatDetalle.js?v=3" defer></script>
	Cuando está presente, especifica que el script se ejecuta cuando la página ha terminado de analizarse.

	<script src="vistas/dist/js/chatDetalle.js?v=3" async></script>
	Si asyn cestá presente: el script se ejecuta de forma asincrónica con el resto de la página (el script se ejecutará mientras la página continúa el análisis
	
-------------------------------------------------------------------------------------
separador de miles:	

	function formatNumber(num) {
	    if (!num || num == 'NaN') return '-';
	    if (num == 'Infinity') return '&#x221e;';
	    num = num.toString().replace(/\$|\,/g, '');
	    if (isNaN(num))
		num = "0";
	    sign = (num == (num = Math.abs(num)));
	    num = Math.floor(num * 100 + 0.50000000001);
	    cents = num % 100;
	    num = Math.floor(num / 100).toString();
	    if (cents < 10)
		cents = "0" + cents;
	    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
		num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
	    return (((sign) ? '' : '-') + num + ',' + cents);
	}
