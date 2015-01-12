<?php
include '../data/conexion.php';
$conexion = conectarse();
$user = $_GET['txt_1'];
$pass = $_GET['txt_2'];
if (!$sidx)
    $sidx = 1;
$result = pg_query("SELECT COUNT(*) AS count from cliente, ciudad where cliente.ciudad = ciudad.id_ciudad");
while ($row = pg_fetch_row($result)) {
	print_r($row);
}
?>