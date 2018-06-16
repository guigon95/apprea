<?php 

	require_once ('../../database.php');

	session_start();
	
		

		

		$sql = "update usuario_has_fase set porcentagem = ".$_POST['porcentagem']." where id_usuario = ".$_SESSION['id_usuario']." and id_fase = ".$_POST['id_fase'];
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	


		 
		
		

	
 ?>	