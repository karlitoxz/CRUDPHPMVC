Numeros a formato moneda:
	<?php 
		$fmt = new NumberFormatter( 'es_CO', NumberFormatter::CURRENCY );
		$number = 250000;
		$numberFormat = $fmt->formatCurrency($number, "COP")."\n";
		echo $numberFormat;
	?>