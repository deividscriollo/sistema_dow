<?php

function cargarSelect($conexion, $sql) {
    $lista = array();
    $data = 0;
    $sql = pg_query($conexion, $sql);
    if ($sql) {
        while ($row = pg_fetch_row($sql)) {
            $lista[] = $row[0];
            $lista[] = $row[1];
        }
        echo $lista = json_encode($lista);
    }
}

function unique($fecha_larga) {
    $id = uniqid();
    $id = $fecha_larga . $id;
    return $id;
}

function guardarSql($conexion, $sql) {
    $resp = true;    
    if (pg_query($conexion, $sql)) {
        $resp = 'true';
    } else {
        $resp = 'false';
    }
    return $resp;
}

function id($conexion, $sql) { //retorna el id de una consulta con solo un parametro de retorno en el sql
    $id = 0;
    $sql = pg_query($conexion, $sql);
    while ($row = pg_fetch_row($sql)) {
        $id = $row[0];
    }
    echo $id;
}

function repetidos($conexion, $campo, $valor, $tabla, $tipo, $id, $id_campo) {///conexion,campo a comparar,valor campo,tabla,tipo g o m id si tiene, id campo si tiene
    $repetidos = 'true';
    if ($tipo == "g") {
        $sql = "select " . $campo . " from " . $tabla . " where " . $campo . " = '" . $valor . "'";
        if (pg_num_rows(pg_query($conexion, $sql))) {
            $repetidos = 'true';
        } else {
            $repetidos = 'false';
        }
    } else {
        if ($tipo == "m") {
            $sql = "select " . $campo . " from " . $tabla . " where " . $campo . " = '" . $valor . "' and " . $id_campo . " not in ('$id') ";
            if (pg_num_rows(pg_query($conexion, $sql))) {
                $repetidos = 'true';
            } else {
                $repetidos = 'false';
            }
        } else {
            
        }
    }
    return $repetidos;
}
function repetidos_1($conexion, $campo, $valor, $tabla, $tipo, $id, $id_campo ,$extra_campo,$extra_campo_1) {///conexion,campo a comparar,valor campo,tabla,tipo g o m id si tiene, id campo si tiene
    $repetidos = 'true';
    if ($tipo == "g") {
        $sql = "select " . $campo . " from " . $tabla . " where " . $campo . " = '" . $valor . "' and " . $extra_campo . " = '" .$extra_campo_1. "'";        
        if (pg_num_rows(pg_query($conexion, $sql))) {
            $repetidos = 'true';
        } else {
            $repetidos = 'false';
        }
    } else {
        if ($tipo == "m") {
            $sql = "select " . $campo . " from " . $tabla . " where " . $campo . " = '" . $valor . "' and " . $extra_campo . " = '" .$extra_campo_1. "'  and " . $id_campo . " not in ('$id') ";            
            if (pg_num_rows(pg_query($conexion, $sql))) {
                $repetidos = 'true';
            } else {
                $repetidos = 'false';
            }
        } else {
            
        }
    }
    return $repetidos;
}
?>