<?php
date_default_timezone_set('America/Bogota');
function fechas(){

	$mes=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	return date('d') . " de " . $mes[date('n')] . " de " . date('Y') . " hora " . date('H:i:s');

}


?>
