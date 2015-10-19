<?php 
//inclucion de librerias
	include '../conexion.php';
	include '../funciones_generales.php';
	include '../correos/mail.php';
	// include '../correos/prueba.php';
	$conexion = conectarse();
	date_default_timezone_set('America/Guayaquil');
	$fecha = date('Y-m-d H:i:s', time());
	$fecha_larga = date('His', time());
	$sql = "";
	$sql2 = "";	
	$sql3 = "";
	$sql4 = "";
	$id_session = sesion_activa();///datos session
	$id = unique($fecha_larga);
	
	///////////////////////guardar factura venta////////////////////
    $num_serie = "001-001-".$_POST['serie3'];

	$sql = "insert into factura_venta values ('$id','$_POST[id_cliente]','$id_session','$_POST[serie3]','$fecha','$_POST[hora]','$num_serie','$_POST[fecha_cancelacion]','$_POST[tipo]','$_POST[formas]','$_POST[tarifa0]','$_POST[tarifa12]','$_POST[iva]','$_POST[descuento_total]','$_POST[total]','Activo','$fecha')";	
		
	$guardar = guardarSql($conexion,$sql);
	if( $guardar == 'true'){
		$data = 0; ////datos guardados		
	}else{
		$data = 2; /// error al guardar
	}

	/////datos detalle factura/////
	$campo1 = $_POST['campo1'];
	$campo2 = $_POST['campo2'];
	$campo3 = $_POST['campo3'];
	$campo4 = $_POST['campo4'];
	$campo5 = $_POST['campo5'];
	///////////////////////////////

	////////////descomponer detalle_factura_compra////////
	$arreglo1 = explode(',', $campo1);
	$arreglo2 = explode(',', $campo2);
	$arreglo3 = explode(',', $campo3);
	$arreglo4 = explode(',', $campo4);
	$arreglo5 = explode(',', $campo5);
	$nelem = count($arreglo1);

	for ($i = 0; $i < $nelem; $i++) {		
	$id2 = unique($fecha_larga);
	$stock = 0;
	$cal = 0;
	///guardar detalle_factura/////
    $sql2 = "insert into detalle_factura_venta values (
   	'$id2','$id','".$arreglo1[$i]."','".$arreglo2[$i]."','".$arreglo3[$i]."','".$arreglo4[$i]."','".$arreglo5[$i]."','Activo','$fecha')";       
	$guardar = guardarSql($conexion,$sql2);
	//////////////////////////////
    

    //////////////modificar productos///////////
    $consulta = pg_query("select * from productos where id_productos = '".$arreglo1[$i]."'");
    while ($row = pg_fetch_row($consulta)) {
        $stock = $row[10];
    }
    $cal = $stock - $arreglo2[$i];
    

    $sql3 = "update productos set precio='".$arreglo3[$i]."', stock='$cal' where id_productos='".$arreglo1[$i]."'";								
	$guardar = guardarSql($conexion, $sql3);
    ///////////////////////////////////////////
	//
    //////////////agregar al kardex///////////
    $sql4 = "insert into kardex values (
   	'$id2','".$arreglo1[$i]."','$fecha','Factura Venta','$num_serie','".$arreglo2[$i]."','".$arreglo3[$i]."','".$arreglo5[$i]."','Egreso','2','$fecha')";       
	$guardar = guardarSql($conexion,$sql4);

	////////////////////////////////////////
}


//validando_xml($id,'fecha','total','detalle','cliente','ruc_ced','total_sin inpuestos','descuento','iva','diferencia','telefono','num_factu','dir-client','orden_num');

$l='localhost/sistema_dow/data/reportes/factura_venta.php?id='.$id;
envio_correo_ventas($_POST['correo'],$_POST['nombre'],$_POST['total'],$l, $num_serie);

///generamos el xml//////////
if($data == 0){
	xml_factura($id,$conexion);	
	echo $data;
}else{
	echo $data;
}

/////////////////////////////

function xml_factura($id_xml,$conn){		
	$fecha = date('Y-m-d H:i:s', time());
	$sql = pg_query($conn,"select nombre_empresa,ruc_empresa,direccion,autorizacion_sri from empresa where id_empresa = '09594354b7d5df18f18'");
	while ($row = pg_fetch_row($sql)) {		
		$nombreComercial = $row[0];
		$ruc =$row[1];
		$dirMatriz = $row[2];		
	}	
	$razonSocial = 'TOTORA SISA';		
	$claveAcceso = '2110201101179214673900110020010000000011234567813';
	$codDoc = '01';
	$estab = '001';
	$ptoEmision = '001';
	$secuencial = $_POST['serie3'];	
	$fechaEmision = '$fecha';
	$dirEstablecimiento = $_POST['serie3'];
	$contribuyenteEspecial = '5368';
	$obligadoContabilidad = 'Si';

	$sql = pg_query($conn,"select tipo_documento,identificacion,nombres_completos,direccion from factura_venta,cliente where factura_venta.id_cliente = cliente.id_cliente and id_factura_venta = '".$id_xml."'");	
	while ($row = pg_fetch_row($sql)) {		
		if($row[0] == 'RUC'){
			$tipoIdentificacionComprador = '04';		
		}
		if($row[0] == 'Cedula'){
			$tipoIdentificacionComprador = '05';		
		}
		if($row[0] == 'Pasaporte'){
			$tipoIdentificacionComprador = '06';		
		}
		$razonSocialComprador = $row[2];
		$identificacionComprador = $row[1];
		$direccionComprador = $row[3];
		$totalSinImpuestos = $_POST['tarifa0'] + $_POST['tarifa12'];
		$totalDescuento = $_POST['descuento_total'];		
	}			
	$guiaRemision = '';///no hay en factura venta			

	//////impuestos////////				
	$consulta = "select iva_producto,detalle_factura_venta.precio, cantidad from detalle_factura_venta,productos where detalle_factura_venta.id_productos = productos.id_productos and detalle_factura_venta.id_factura_venta = '".$id_xml."'";	
	$consulta = pg_query($consulta);		
	while($row = pg_fetch_row($consulta)){				
		$codigo = '2';	//IVA 2 				
		if($row[0] == 'on'){			
			$codigoPorcentaje = '2';
			$baseImponible = ($row[1] * $row[2]);
			$baseImponible = number_format($baseImponible, 2, '.', '');
			$valor = ($row[1] * $row[2])  * 0.12;
			$valor = number_format($valor, 2, '.', '');			
		}else{
			$codigoPorcentaje = '0';
			$baseImponible = ($row[1] * $row[2]);
			$baseImponible = number_format($baseImponible, 2, '.', '');
			$valor =  '0.00';		
		}				
		$descuentoAdicional = '';		
	}				
	$codigo3 = '';//ICE 3
	$codigoPorcentaje3 = '';
	$baseImponible3 = '';
	$valor3 = '';

	$codigo5 = '';//ibnpr
	$codigoPorcentaje5 = '';
	$baseImponible5 = '';
	$descuentoAdicional5 = '';
	$valor5 = '';
	$tarifa = '';
	$propina = '0.00';
	$importeTotal = $baseImponible + $valor;
	$moneda = 'DOLAR';

	$marca = '';
	$modelo = '';
	$chasis = '';
	///////////////////////


	header("Content-type: text/xml;charset=UTF-8");
	$s = "<?xml version='1.0' encoding='UTF-8'?>";
	$s .= "<factura id='comprobante' version='1.0.0'>";
		$s .= "<infoTributaria>";
			$s .= "<ambiente>1</ambiente>";
			$s .= "<tipoEmision>1</tipoEmision>";
			$s .= "<razonSocial>".$razonSocial."</razonSocial>";
			$s .= "<nombreComercial>".$nombreComercial."</nombreComercial>";
			$s .= "<ruc>".$ruc."</ruc>";
			$s .= "<claveAcceso>".$claveAcceso."</claveAcceso>";
			$s .= "<codDoc>".$codDoc."</codDoc>";
			$s .= "<estab>".$estab."</estab>";
			$s .= "<ptoEmision>".$ptoEmision."</ptoEmision>";
			$s .= "<secuencial>".$secuencial."</secuencial>";
			$s .= "<dirMatriz>".$dirMatriz."</dirMatriz>";
		$s .= "</infoTributaria>";
		$s .= "<infoFactura>";
			$s .= "<fechaEmision>".$fechaEmision."</fechaEmision>"; 
			$s .= "<dirEstablecimiento>".$dirEstablecimiento."</dirEstablecimiento>"; 
			$s .= "<contribuyenteEspecial>".$contribuyenteEspecial."</contribuyenteEspecial>"; 
			$s .= "<obligadoContabilidad>".$obligadoContabilidad."</obligadoContabilidad>"; 
			$s .= "<tipoIdentificacionComprador>".$tipoIdentificacionComprador."</tipoIdentificacionComprador>"; 
			$s .= "<guiaRemision>".$guiaRemision."</guiaRemision>"; 
			$s .= "<razonSocialComprador>".$razonSocialComprador."</razonSocialComprador>"; 
			$s .= "<identificacionComprador>".$identificacionComprador."</identificacionComprador>";
			$s .= "<direccionComprador>".$direccionComprador."</direccionComprador>";
			$s .= "<totalSinImpuestos>".$totalSinImpuestos."</totalSinImpuestos>";
			$s .= "<totalDescuento>".$totalDescuento."</totalDescuento>";
			$s .= "<totalConImpuestos>";	
			$s .= "<totalImpuesto>";///codigo 3
				$s .= "<codigo>".$codigo3."</codigo>";
				$s .= "<codigoPorcentaje>".$codigoPorcentaje3."</codigoPorcentaje>";	
				$s .= "<baseImponible>".$baseImponible3."</baseImponible>";
				$s .= "<valor>".$valor3."</valor>";		
			$s .= "</totalImpuesto>";
			$s .= "<totalImpuesto>";////codigo 2
				$s .= "<codigo>".$codigo."</codigo>";
				$s .= "<codigoPorcentaje>".$codigoPorcentaje."</codigoPorcentaje>";
				$s .= "<descuentoAdicional>".$descuentoAdicional."</descuentoAdicional>";
				$s .= "<baseImponible>".$baseImponible."</baseImponible>";
				$s .= "<valor>".$valor."</valor>";		
			$s .= "</totalImpuesto>";
			$s .= "<totalImpuesto>";////codigo 5
				$s .= "<codigo>".$codigo."</codigo>";
				$s .= "<codigoPorcentaje>".$codigoPorcentaje5."</codigoPorcentaje>";
				$s .= "<descuentoAdicional>".$descuentoAdicional5."</descuentoAdicional>";
				$s .= "<baseImponible>".$baseImponible5."</baseImponible>";
				$s .= "<valor>".$valor5."</valor>";		
			$s .= "</totalImpuesto>";
			$s .= "</totalConImpuestos>";
			$s .= "<propina>".$propina."</propina>";		
			$s .= "<importeTotal>".$importeTotal."</importeTotal>";		
			$s .= "<moneda>".$moneda."</moneda>";		
		$s .= "</infoFactura>";
		$s .= "<detalles>";
		$sql = pg_query("select iva_producto,detalle_factura_venta.precio, cantidad,codigo,descripcion,detalle_factura_venta.precio,total,iva_producto from detalle_factura_venta,productos where detalle_factura_venta.id_productos = productos.id_productos and detalle_factura_venta.id_factura_venta = '".$id_xml."'");
		while ($row = pg_fetch_row($sql)) {
			$s .= "<detalle>";
				$s .= "<codigoPrincipal>".$row[3]."</codigoPrincipal >";
				$s .= "<codigoAuxiliar>".''."</codigoAuxiliar >";
				$s .= "<descripcion>".$row[4]."</descripcion >";
				$s .= "<cantidad>".$row[2]."</cantidad >";
				$s .= "<precioUnitario>".$row[1]."</precioUnitario >";
				$s .= "<descuento>".'0.00'."</descuento >";
				$precioTotalSinImpuesto=number_format($row[2] * $row[1], 2, '.', '');
				$s .= "<precioTotalSinImpuesto>".$precioTotalSinImpuesto."</precioTotalSinImpuesto >";
				$s .= "<detallesAdicionales>";
					$s .= "<detAdicional nombre='Marca' valor = '".$marca."' />";
					$s .= "<detAdicional nombre='Modelo' valor = '".$modelo."' />";
					$s .= "<detAdicional nombre='Chasis' valor = '".$chasis."' />";
				$s .= "</detallesAdicionales>";	
				$s .= "<impuestos>";
					$s .= "<impuesto>";///codigo 3
						$s .= "<codigo>".$codigo."</codigo>";
						$s .= "<codigoPorcentaje>".$codigoPorcentaje."</codigoPorcentaje>";
						$s .= "<tarifa>".$tarifa."</tarifa>";
						$s .= "<baseImponible>".$baseImponible."</baseImponible>";
						$s .= "<valor>".$valor."</valor>";
					$s .= "</impuesto>";
					$s .= "<impuesto>";///codigo 2
						if($row[7] == 'on'){//12%
							$s .= "<codigo>".'2'."</codigo>";
							$s .= "<codigoPorcentaje>".'2'."</codigoPorcentaje>";
							$s .= "<tarifa>".'12'."</tarifa>";
							$baseImponible_12 = ($row[1] * $row[2]);
							$baseImponible_12 = number_format($baseImponible_12, 2, '.', '');
							$valor_12 = ($row[1] * $row[2])  * 0.12;
							$valor_12 = number_format($valor_12, 2, '.', '');
							$s .= "<baseImponible>".$baseImponible_12."</baseImponible>";
							$s .= "<valor>".$valor_12."</valor>";	
						}else{//0%
							$baseImponible_0 = ($row[1] * $row[2]);
							$baseImponible_0 = number_format($baseImponible_0, 2, '.', '');
							$valor_0 = ($row[1] * $row[2])  * 0.12;
							$valor_0 = number_format($valor_0, 2, '.', '');
							$s .= "<codigo>".'2'."</codigo>";
							$s .= "<codigoPorcentaje>".'0'."</codigoPorcentaje>";
							$s .= "<tarifa>".'12'."</tarifa>";
							$s .= "<baseImponible>".$baseImponible_0."</baseImponible>";
							$s .= "<valor>".$valor_0."</valor>";	
						}						
					$s .= "</impuesto>";
					$s .= "<impuesto>";///codigo 5
						$s .= "<codigo>".$codigo."</codigo>";
						$s .= "<codigoPorcentaje>".$codigoPorcentaje."</codigoPorcentaje>";
						$s .= "<tarifa>".$tarifa."</tarifa>";
						$s .= "<baseImponible>".$baseImponible."</baseImponible>";
						$s .= "<valor>".$valor."</valor>";
					$s .= "</impuesto>";
				$s .= "</impuestos>";
			$s .= "</detalle>";
		}					
		$s .= "</detalles>";
		$s .= "<infoAdicional>";
			$s .= "<campoAdicional nombre='Codigo Impuesto ISD'>".''."</campoAdicional>";
			$s .= "<campoAdicional nombre='Impuesto ISD'>".''."</campoAdicional>";
		$s .= "</infoAdicional>";
		$s .= '<ds:Signature xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:etsi="http://uri.etsi.org/01903/v1.3.2#" Id="Signature821917"><ds:SignedInfo Id="Signature-SignedInfo632756"><ds:CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"></ds:CanonicalizationMethod><ds:SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"></ds:SignatureMethod><ds:Reference Id="SignedPropertiesID536836" Type="http://uri.etsi.org/01903#SignedProperties" URI="#Signature821917-SignedProperties1046174"><ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"></ds:DigestMethod><ds:DigestValue>AGZJyuTNJdNJW+BoHLDK9fjpfJg=</ds:DigestValue></ds:Reference><ds:Reference URI="#Certificate1493983"><ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"></ds:DigestMethod><ds:DigestValue>jnmlievKJO9HvrbaPCZEfOwzmzE=</ds:DigestValue></ds:Reference><ds:Reference Id="Reference-ID-1014615" URI="#comprobante"><ds:Transforms><ds:Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"></ds:Transform></ds:Transforms><ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"></ds:DigestMethod><ds:DigestValue>l1hIIN3x6YD3Yuh/eSOqslBaS7M=</ds:DigestValue></ds:Reference></ds:SignedInfo><ds:SignatureValue Id="SignatureValue733416">kiiHNSIj9K73sYb/5SoiNN7N/2gdvCMVzvhxP+d9G3r6v7xIJOc4tK5UoEGnwii/Afcq1TYcv0zhbegklYuowqTsfvIBV0o9ogyn2rMRdYL7f0zPQNbbOmhLw1PKRC/EVpa+Jng5ujp547RdwMdXO6xeEW1QiFiTanczK9pq3/qg4pFFA/Bq/A4R3jwA8hoEhzWSeDsRIWlYNgLx/ZORlpV2tY+wVjrcHMdexU0f0+q6sjsjo9EMGBS406rvJCGjaq/h03D5XXHsi0qC0+ZfrjdxqgSpJndVixNnSrSA9xVmxwDhmrjPMnKpr4x/51UC6QjivLgDxNKRgzAqwRgVfQ==</ds:SignatureValue><ds:KeyInfo Id="Certificate1493983"><ds:X509Data><ds:X509Certificate>MIIJmjCCCIKgAwIBAgIETV3RuDANBgkqhkiG9w0BAQsFADCBkzELMAkGA1UEBhMCRUMxGzAZBgNVBAoTElNFQ1VSSVRZIERBVEEgUy5BLjEwMC4GA1UECxMnRU5USURBRCBERSBDRVJUSUZJQ0FDSU9OIERFIElORk9STUFDSU9OMTUwMwYDVQQDEyxBVVRPUklEQUQgREUgQ0VSVElGSUNBQ0lPTiBTVUIgU0VDVVJJVFkgREFUQTAeFw0xNDAzMzExNzQ0NTBaFw0xNjAzMzExODE0NTBaMIGEMQswCQYDVQQGEwJFQzEbMBkGA1UEChMSU0VDVVJJVFkgREFUQSBTLkEuMTAwLgYDVQQLEydFTlRJREFEIERFIENFUlRJRklDQUNJT04gREUgSU5GT1JNQUNJT04xJjAkBgNVBAMTHUdlcm1hbiBGcmFuY2lzY28gU2FvbmEgR2FiZWxhMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAoGu/jCm7g02FSAdHHyJeWEU5G5D1FsRHM7XcV01gIQmW43bQGDs5AFD6xgpqcvUV6PgliV8IYrmOYMrfpsFGl7IAjAI07cJlmgWHNXNxV/VqxW1XdFoHmDG5gRqCHC3rMB/BFYYHzkaQ3vW+WytDcKcv9W+PaTOBHfJ5owseFO7W9s5nxWU5/OVa0ConR+E80dYTykaH7XlYuGHV93K8P4cZdxn+56STNsFOVC3D8oWGOoLBcPHqbdoLXhMRpj+QQfc2MYZC2wbvNx0nJnLOXmbEFvenXUrE8DLPDf6pJ2kKTh7fnE0O1WjzmVxUnIPkETXZ8RkGHwvUs6728fmNSwIDAQABo4IGATCCBf0wCwYDVR0PBAQDAgbAMFkGCCsGAQUFBwEBBE0wSzBJBggrBgEFBQcwAYY9aHR0cDovL29jc3Bndy5zZWN1cml0eWRhdGEubmV0LmVjL2VqYmNhL3B1YmxpY3dlYi9zdGF0dXMvb2NzcDCBygYDVR0gBIHCMIG/MD8GCisGAQQBgqZyAgowMTAvBggrBgEFBQcCAjAjGiFDZXJ0aWZpY2FkbyBkZSBNaWVtYnJvIGRlIEVtcHJlc2EwfAYKKwYBBAGCpnICBDBuMGwGCCsGAQUFBwIBFmBodHRwczovL3d3dy5zZWN1cml0eWRhdGEubmV0LmVjL2xleWVzX25vcm1hdGl2YXMvUG9saXRpY2FzIGRlIENlcnRpZmljYWRvIE1pZW1icm8gZGUgRW1wcmVzYS5wZGYwGwYKKwYBBAGCpnIDCgQNEwtPVEVDRUwgUy5BLjAdBgorBgEEAYKmcgMLBA8TDTE3OTEyNTYxMTUwMDEwGgYKKwYBBAGCpnIDAQQMEwoxNzA4NDQzMjExMCAGCisGAQQBgqZyAwIEEhMQR2VybWFuIEZyYW5jaXNjbzAVBgorBgEEAYKmcgMDBAcTBVNhb25hMBYGCisGAQQBgqZyAwQECBMGR2FiZWxhMCIGCisGAQQBgqZyAwUEFBMSR2VyZW50ZSBUcmlidXRhcmlvMDAGCisGAQQBgqZyAwcEIhMgQXYuIFJlcHVibGljYSBFNy0xNiB5IExhIFByYWRlcmEwFgYKKwYBBAGCpnIDIgQIEwYxNzAxMDIwHQYKKwYBBAGCpnIDCAQPEw01OTMtMi0yMjI3NzAwMBUGCisGAQQBgqZyAwkEBxMFUXVpdG8wFwYKKwYBBAGCpnIDDAQJEwdFY3VhZG9yMBMGCisGAQQBgqZyAyAEBRMDMDAxMBMGCisGAQQBgqZyAyEEBRMDUEZYMCYGA1UdEQQfMB2BG2dlcm1hbi5zYW9uYUB0ZWxlZm9uaWNhLmNvbTCCAnkGA1UdHwSCAnAwggJsMIICaKCCAmSgggJghj1odHRwOi8vb2NzcGd3LnNlY3VyaXR5ZGF0YS5uZXQuZWMvZWpiY2EvcHVibGljd2ViL3N0YXR1cy9vY3NwhoHUbGRhcDovL2RpcmVjdC5zZWN1cml0eWRhdGEubmV0LmVjL2NuPUNSTDUzLGNuPUFVVE9SSURBRCUyMERFJTIwQ0VSVElGSUNBQ0lPTiUyMFNVQiUyMFNFQ1VSSVRZJTIwREFUQSxvdT1FTlRJREFEJTIwREUlMjBDRVJUSUZJQ0FDSU9OJTIwREUlMjBJTkZPUk1BQ0lPTixvPVNFQ1VSSVRZJTIwREFUQSUyMFMuQS4sYz1FQz9jZXJ0aWZpY2F0ZVJldm9jYXRpb25MaXN0P2Jhc2WGgZ5odHRwczovL2RpcmVjdC5zZWN1cml0eWRhdGEubmV0LmVjL35jcmwvYXV0b3JpZGFkX2RlX2NlcnRpZmljYWNpb25fc3ViX3NlY3VyaXR5X2RhdGFfZW50aWRhZF9kZV9jZXJ0aWZpY2FjaW9uX2RlX2luZm9ybWFjaW9uX2N1cml0eV9kYXRhX3MuYS5fY19lY19jcmxmaWxlLmNybKSBpjCBozELMAkGA1UEBhMCRUMxGzAZBgNVBAoTElNFQ1VSSVRZIERBVEEgUy5BLjEwMC4GA1UECxMnRU5USURBRCBERSBDRVJUSUZJQ0FDSU9OIERFIElORk9STUFDSU9OMTUwMwYDVQQDEyxBVVRPUklEQUQgREUgQ0VSVElGSUNBQ0lPTiBTVUIgU0VDVVJJVFkgREFUQTEOMAwGA1UEAxMFQ1JMNTMwKwYDVR0QBCQwIoAPMjAxNDAzMzExNzQ0NTBagQ8yMDE2MDMxNzAzMTQ1MFowHwYDVR0jBBgwFoAU9y9M4HXnYqN4llsGti5xO8xsP5AwHQYDVR0OBBYEFCxnxVX+jp2g9+XETu7COW3kpxn6MAkGA1UdEwQCMAAwGQYJKoZIhvZ9B0EABAwwChsEVjguMQMCA6gwDQYJKoZIhvcNAQELBQADggEBABsaPiyUKCjCa+Nz9bRVbumFhkRXedmZhnb9bMpsNicGoP/zh/qwpbZasnKSnxPhAR8I79p4GeE8d26VIz7nXJsjtcGeEzhalG6dipmawOcuKHwB1iISRNJnJQCLjZLnZs/GkDHtwNFDjilV9sOhL0GWhOxUGPb5L+a/qTaAnPnjzKmkaquTlt5NCdSHbVc/wEnlJZSLsIh65owEVXmYFVGzD6qcd9YJVfVaVQqoMGRttZ5Es5QkcXxPnBEpa+NJ2XIVmPfq4FKBDYbwLFphYA03C6jvIBYsOA3vGpdagpmuypOMeJvsdxJaA70QmTRTUbIu8psRTxufi1AejHqKu0g=</ds:X509Certificate></ds:X509Data><ds:KeyValue><ds:RSAKeyValue><ds:Modulus>oGu/jCm7g02FSAdHHyJeWEU5G5D1FsRHM7XcV01gIQmW43bQGDs5AFD6xgpqcvUV6PgliV8IYrmOYMrfpsFGl7IAjAI07cJlmgWHNXNxV/VqxW1XdFoHmDG5gRqCHC3rMB/BFYYHzkaQ3vW+WytDcKcv9W+PaTOBHfJ5owseFO7W9s5nxWU5/OVa0ConR+E80dYTykaH7XlYuGHV93K8P4cZdxn+56STNsFOVC3D8oWGOoLBcPHqbdoLXhMRpj+QQfc2MYZC2wbvNx0nJnLOXmbEFvenXUrE8DLPDf6pJ2kKTh7fnE0O1WjzmVxUnIPkETXZ8RkGHwvUs6728fmNSw==</ds:Modulus><ds:Exponent>AQAB</ds:Exponent></ds:RSAKeyValue></ds:KeyValue></ds:KeyInfo><ds:Object Id="Signature821917-Object1020297"><etsi:QualifyingProperties Target="#Signature821917"><etsi:SignedProperties Id="Signature821917-SignedProperties1046174"><etsi:SignedSignatureProperties><etsi:SigningTime>2015-09-09T08:56:10-05:00</etsi:SigningTime><etsi:SigningCertificate><etsi:Cert><etsi:CertDigest><ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"></ds:DigestMethod><ds:DigestValue>HKuWS+THuR2k7iJsljsG7+r7wgA=</ds:DigestValue></etsi:CertDigest><etsi:IssuerSerial><ds:X509IssuerName>CN=AUTORIDAD DE CERTIFICACION SUB SECURITY DATA,OU=ENTIDAD DE CERTIFICACION DE INFORMACION,O=SECURITY DATA S.A.,C=EC</ds:X509IssuerName><ds:X509SerialNumber>1297994168</ds:X509SerialNumber></etsi:IssuerSerial></etsi:Cert></etsi:SigningCertificate></etsi:SignedSignatureProperties><etsi:SignedDataObjectProperties><etsi:DataObjectFormat ObjectReference="#Reference-ID-1014615"><etsi:Description>contenido comprobante</etsi:Description><etsi:MimeType>text/xml</etsi:MimeType></etsi:DataObjectFormat></etsi:SignedDataObjectProperties></etsi:SignedProperties></etsi:QualifyingProperties></ds:Object></ds:Signature>';
	$s .= "</factura>";


	echo $s;
}
?>