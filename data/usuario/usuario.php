<?php
	include '../conexion.php';
	include '../funciones_generales.php';		
	$conexion = conectarse();
	date_default_timezone_set('America/Guayaquil');
    $fecha=date('Y-m-d H:i:s', time()); 
    $fecha_larga = date('His', time()); 
	$sql = "";	
	$id = unique($fecha_larga);	
	$check = "OFF";
	$extension = explode(".", $_FILES["txt_0"]["name"]);
	$extension = end($extension);
	$type = $_FILES["txt_0"]["type"];
	$tmp_name = $_FILES["txt_0"]["tmp_name"];
	$size = $_FILES["txt_0"]["size"];	
	$img = basename($_FILES["txt_0"]["name"], "." . $extension);		
	if(isset($_POST["form-field-checkbox"]))
		$check = "ON";		
	
	if($_GET['tipo'] == "g"){
		$repetidos = repetidos($conexion,"usuario",strtoupper($_POST["txt_13"]),"usuario","g","","");	
		if( $repetidos == 'true'){
			$data = 1; /// este dato ya existe;
		}else{		
			if ($img == "") {
				$sql ="insert into usuario values ('$id','$_POST[txt_1]','$_POST[txt_2]','$_POST[txt_3]','$_POST[txt_7]','$_POST[txt_11]','$_POST[txt_12]','$_POST[txt_8]','$_POST[txt_13]','$_POST[txt_4]','0','default.jpg','$check')";					
			}else{
				$foto = $id . '.' . $extension;
				move_uploaded_file($_FILES["txt_0"]["tmp_name"], "img/" . $foto);	
				$sql ="insert into usuario values ('$id','$_POST[txt_1]','$_POST[txt_2]','$_POST[txt_3]','$_POST[txt_7]','$_POST[txt_11]','$_POST[txt_12]','$_POST[txt_8]','$_POST[txt_13]','$_POST[txt_4]','0','$foto','$check')";						
			}	
			$guardar = guardarSql($conexion,$sql);
			if( $guardar == 'true'){
				$data = 0; ////datos guardados
			}else{
				$data = 2; /// error al guardar
			}
		}
	}else{
		if($_GET['tipo'] == "m"){
		}
	}	
	echo $data;
?>