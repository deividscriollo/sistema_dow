<?php
	include '../conexion.php';
	$conexion = conectarse();
	$sql = "";
	$lista1 = array();
	$id_tabla = '';
	//verificar existencia de documentp
	if (isset($_POST['existencia'])) {
		$acus=1;
		$consulta = pg_query("SELECT ID_FACTURA_VENTA FROM FACTURA_VENTA FV, CLIENTE C WHERE C.ID_CLIENTE=FV.ID_CLIENTE AND IDENTIFICACION='$_POST[reg]'");
		while ($row = pg_fetch_row($consulta)) {
		    $acus=0;
		}
		print $acus;
	}
	//muestra resultados de un valor encontrado
	if (isset($_POST['cargar_tabla'])) {
		$consulta = pg_query("	SELECT ID_FACTURA_VENTA,C.nombres_completos,COMPROBANTE,FECHA_ACTUAL,NUMERO_SERIE,TOTAL,IDENTIFICACION
								FROM FACTURA_VENTA FV, CLIENTE C
								WHERE C.ID_CLIENTE=FV.ID_CLIENTE 
								AND IDENTIFICACION='$_POST[txt_1]'");
		while ($row = pg_fetch_row($consulta)) {
		    $lista[] = $row[0];
		    $lista[] = $row[1];
		    $lista[] = $row[2];
		    $lista[] = $row[3];
		    $lista[] = $row[4];
		    $lista[] = $row[5];
		    $lista[] = '<button class="btn btn-white btn-default btn-round">
							<i class="ace-icon fa fa-times red2"></i>
							Imprimir
						</button>';
		}
		echo $lista = json_encode($lista);
	}		
	
?>