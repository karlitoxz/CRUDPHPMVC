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
