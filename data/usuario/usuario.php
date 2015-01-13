<?php
	include '../conexion.php';
	include '../funciones_generales.php';		
	$conexion = conectarse();	
    date_default_timezone_set('America/Guayaquil');
	$fecha = date('Y-m-d H:i:s', time());
	$fecha_larga = date('His', time());
	$sql = "";	
	$id = unique($fecha_larga);	
	$id_c = unique($fecha_larga);	
	$check = "OFF";
	$extension = explode(".", $_FILES["avatar"]["name"]);
	$extension = end($extension);
	$type = $_FILES["avatar"]["type"];
	$tmp_name = $_FILES["avatar"]["tmp_name"];
	$size = $_FILES["avatar"]["size"];	
	$img = basename($_FILES["avatar"]["name"], "." . $extension);		
	if(isset($_POST["form-field-checkbox"]))
		$check = "ON";		
	
	if($_GET['tipo'] == "g"){
		$repetidos = repetidos($conexion,"usuario",strtoupper($_POST["txt_13"]),"usuario","g","","");	
		if( $repetidos == 'true'){
			$data = 1; /// este usuario ya existe;
		}else{		
			$repetidos = repetidos($conexion,"identificacion",strtoupper($_POST["txt_1"]),"usuario","g","","");		
			if( $repetidos == 'true'){
				$data = 2; /// este nro de cedula ya existe;
			}else{		
				if ($img == "") {
				$sql ="insert into usuario values ('$id','$_POST[txt_1]','$_POST[txt_2]','$_POST[txt_3]','$_POST[txt_7]','$_POST[txt_11]','$_POST[txt_12]','$_POST[txt_8]','$_POST[txt_13]','$_POST[txt_4]','0','default.png','$check','$fecha')";					
				}else{
					$foto = $id . '.' . $extension;
					move_uploaded_file($_FILES["txt_0"]["tmp_name"], "img/" . $foto);	
					$sql ="insert into usuario values ('$id','$_POST[txt_1]','$_POST[txt_2]','$_POST[txt_3]','$_POST[txt_7]','$_POST[txt_11]','$_POST[txt_12]','$_POST[txt_8]','$_POST[txt_13]','$_POST[txt_4]','0','$foto','$check','$fecha')";						
				}	
				$guardar = guardarSql($conexion,$sql);
				if( $guardar == 'true'){
					$data = 0; ////datos guardados
				}else{
					$data = 3; /// error al guardar
				}
				$sql = "insert into claves values ('$id_c','$id','$_POST[txt_5]')";
				$guardar = guardarSql($conexion,$sql);
				if( $guardar == 'true'){
					$data = 0; ////datos guardados
				}else{
					$data = 3; /// error al guardar
				}
			}	
		}
	}else{
		if($_GET['tipo'] == "m"){
			$repetidos = repetidos($conexion,"usuario",strtoupper($_POST["txt_13"]),"usuario","m",$_POST['txt_o'],"id_usuario");		
			if( $repetidos == 'true'){
				$data = 1; /// este dato ya existe;
			}else{		
				if ($img == "") {
					$sql ="update usuario set identificacion='$_POST[txt_1]',nombres_completos='$_POST[txt_2]',telefono1='$_POST[txt_3]',telefono2='$_POST[txt_7]',id_ciudad='$_POST[txt_11]',direccion='$_POST[txt_12]',correo='$_POST[txt_8]',usuario='$_POST[txt_13]',id_cargo='$_POST[txt_4]',extranjero='$check' where id_usuario = '$_POST[txt_o]'";					

				}else{
					$foto = $_POST['txt_o'] . '.' . $extension;
					move_uploaded_file($_FILES["txt_0"]["tmp_name"], "img/" . $foto);	
					$sql ="update usuario set identificacion='$_POST[txt_1]',nombres_completos='$_POST[txt_2]',telefono1='$_POST[txt_3]',telefono2='$_POST[txt_7]',id_ciudad='$_POST[txt_11]',direccion='$_POST[txt_12]',correo='$_POST[txt_8]',usuario='$_POST[txt_13]',id_cargo='$_POST[txt_4]',imagen='$foto',extranjero='$check' where id_usuario = '$_POST[txt_o]'";					
				}	
				$guardar = guardarSql($conexion,$sql);
				if( $guardar == 'true'){
					$data = 0; ////datos guardados
				}else{
					$data = 2; /// error al guardar
				}				
				$sql = "update claves set id_usuario='$_POST[txt_o]',clave='$_POST[txt_5]' where id_usuario = '$_POST[txt_o]'";
				guardarSql($conexion,$sql);

			}
		}

	}	
	echo $data;
?>