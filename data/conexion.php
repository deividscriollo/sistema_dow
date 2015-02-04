<?php
    function conectarse()
    {
    	$conexion = null;
        try
        {                             
         $conexion = pg_connect("host=localhost dbname=aplicacion_dow port=5432 user=postgres password=root");
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