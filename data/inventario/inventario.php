<?php 
//inclucion de librerias
	include '../conexion.php';
	include '../funciones_generales.php';
	$conexion = conectarse();
	date_default_timezone_set('America/Guayaquil');
	$fecha = date('Y-m-d H:i:s', time());
	$fecha_larga = date('His', time());
	$sql = "";
	$sql2 = "";
	$id_session = sesion_activa();///datos session
	$id = unique($fecha_larga);

	// if (isset($_POST['buscar_nombre'])) { //buscar nombre con id cliente
	// 	$sql = "select nombres_completos,direccion,telefono1,correo from cliente where id_cliente = '$_POST[id]'";
	// 	buscar_nombres($conexion,$sql);
	// }

	$sql = "insert into inventario values ('$id','$id_session','$fecha','$_POST[hora]','Activo','$fecha')";	
		
	$guardar = guardarSql($conexion,$sql);
	if( $guardar == 'true'){
		$data = 0; ////datos guardados
	}else{
		$data = 2; /// error al guardar
	}


	

?>