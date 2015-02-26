<!-- 
<autorizacion>
<estado>AUTORIZADO</estado>
<numeroAutorizacion>0902201514132517912561150012784234238</numeroAutorizacion>
<fechaAutorizacion>2015-02-09T14:13:25.230-05:00</fechaAutorizacion>
<ambiente>PRODUCCIÓN</ambiente> -->

<?php 
function validando_xml($fecha, $comprobante){
	// $xml = "<?xml version='1.0' encoding='UTF-8'"; 
	// $xml .= "<autorizacion>\n"; 
	// $xml .="<estado>AUTORIZADO</estado>\n";
	// $xml .="<fechaAutorizacion>".$fecha."</fechaAutorizacion>\n";
	// $xml .="<ambiente>".$ambiente."</ambiente>\n";
	// $xml .="<comprobante>".$comprobante."</comprobante>\n";
	// $xml .= "</autorizacion>"; 
	// echo $xml; 


	$dom = new DomDocument('1.0', 'UTF-8');
    //add root
    $root = $dom->appendChild($dom->createElement('autorizacion'));
    //add NodeA element to Root
    $nodeA = $dom->createElement('estado','AUTORIZADO');
    $nodeB = $dom->createElement('numeroAutorizacion','0902201514132517912561150012784234238');
    $nodeC = $dom->createElement('fechaAutorizacion',$fecha);
    $nodeD = $dom->createElement('ambiente','PRODUCCIÓN_DESARROLLO');
    $nodeE = $dom->createElement('comprobante',$comprobante);
    
    

    $root->appendChild($nodeA);
    $root->appendChild($nodeB);
    $root->appendChild($nodeC);
    $root->appendChild($nodeD);
    $root->appendChild($nodeE);
    

    $dom->formatOutput = true; // set the formatOutput attribute of domDocument to true

    // save XML as string or file 
    $test1 = $dom->saveXML(); // put string in test1
    $dom->save('ejemplo1.xml'); // save as file
}
$comprobante=utf8_decode('hola deivid');
validando_xml('2015-02-09T14:13:25.230-05:00',$comprobante);

 ?>