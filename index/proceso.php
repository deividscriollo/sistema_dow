<?php
include '../data/conexion.php';
$conexion = conectarse();
	if(!isset($_SESSION)){
		session_start();		
	}


	if (isset($_POST['g'])) {
		$user = $_POST['txt_1'];
		$pass = $_POST['txt_2'];		
		$acu=0;		
		$result = pg_query("SELECT * FROM USUARIO U, CLAVES C WHERE U.ID_USUARIO=C.ID_USUARIO AND U.USUARIO='$user' AND C.CLAVE=md5('$pass');");
		while ($row = pg_fetch_row($result)) {			
			$_SESSION['iddow']=$row[0];
			$_SESSION['niveldow']=$row[9];
			$_SESSION['nombrescompletosdow']=$row[2];
			$_SESSION['usuariodow']=$row[8];
			$acu=1;
		}
		if ($acu==0) {
			print(0);
		}else print(1);
	}

?>