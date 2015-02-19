<?php 
	include '../conexion.php';
	include '../funciones_generales.php';		
	$conexion = conectarse();
	$lista = array();
	$sql = "select descripcion as label,sum(cantidad::int) as data  from productos,detalle_factura_venta where productos.id_productos = detalle_factura_venta.id_productos  group by descripcion limit 5";
	$lista=carga_json($conexion,$sql); 
	$data = (json_encode($lista));
	echo $data;
	
	

?>