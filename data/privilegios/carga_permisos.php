<?php
	include '../conexion.php';
	include '../funciones_generales.php';		
	$conexion = conectarse();	
    date_default_timezone_set('America/Guayaquil');
	$fecha = date('Y-m-d H:i:s', time());
	$fecha_larga = date('His', time());
	$sql = "select nivel1,nivel2,nivel3 from permisos where id_usuario = '$_GET[id]'";

	$lista = cargarSelect_1($conexion,$sql);	
	$n1 = '';
	$n1 = str_replace("{", "", $lista[0]);
	$n1 = str_replace("}", "", $lista[0]);
	print_r($lista[0]);

?>