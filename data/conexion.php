<?php
    function conectarse()
    {
    	$conexion = null;
        try
        {                     
        $conexion = pg_connect("dbname=d4cfgulkv71tkj host=ec2-23-21-235-249.compute-1.amazonaws.com port=54
32 user=mtoyjuupcusann password=SjgsTqqQArPcpcWBmC2znksaOV sslmode=require");
         //$conexion = pg_connect("host=localhost dbname=aplicacion_dow port=5432 user=postgres password=rootdow");
         if( $conexion == false )
                 throw new Exception( "Error PostgreSQL ".pg_last_error() );
        }
        catch( Exception $e )
        {
          throw $e;
        }
        return $conexion;
    }
?>