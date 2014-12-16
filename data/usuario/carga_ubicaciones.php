<?php
	include '../conexion.php';
	include '../funciones_generales.php';		
	$conexion = conectarse();
	$sql = "";
	if($_GET['fun'] == "1"){//para paises
		if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
			$sql = "select id_pais,descripcion from pais";
			cargarSelect($conexion,$sql);
		}else{

		}
	}else{
		if($_GET['fun'] == "2"){//para paises
			if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
				$sql = "select id_provincia,descripcion from provincia where id_pais = '$_GET[id]'";
				cargarSelect($conexion,$sql);
			}else{

			}
		}else{
			if($_GET['fun'] == "3"){//para paises
				if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
					$sql = "select id_ciudad,descripcion from ciudad where id_provincia = '$_GET[id]'";
					cargarSelect($conexion,$sql);
				}else{

				}
			}else{
				if($_GET['fun'] == "4"){//para cargos
					if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
						$sql = "select id_cargo,descripcion from cargo";
						cargarSelect($conexion,$sql);
					}else{

					}
				}
			}
		}
	}

?>