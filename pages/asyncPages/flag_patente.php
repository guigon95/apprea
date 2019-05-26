<?php 

	require_once ('../../database.php');

	session_start();

		$sql = "update usuario set flag_patente = 0 where id_usuario = ".$_SESSION['id_usuario'];
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	

		$_SESSION['flag_patente'] = 0;
	
	
	

 ?>	