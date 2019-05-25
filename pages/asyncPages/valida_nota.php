<?php 

	require_once ('../../database.php');

	session_start();
	
		

		

		$sql = "update usuario_has_fase set nota = ".$_POST['id_nota']." where id_usuario = ".$_POST['id_usuario']." and id_fase = ".$_POST['id_fase'];
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	


		 
		
		

	
 ?>	