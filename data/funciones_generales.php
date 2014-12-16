<?php
	function cargarSelect($conexion,$sql){		
		$lista = array();
		$data=0;
		$sql = pg_query( $conexion, $sql );
		if($sql){
			while ($row = pg_fetch_row($sql)) {
			   $lista[]=$row[0];					
			   $lista[]=$row[1];					
			}
			echo $lista=json_encode($lista); 
		}
	}
?>