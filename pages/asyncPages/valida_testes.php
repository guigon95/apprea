<?php 

	require_once ('../../database.php');

	session_start();
	
		

		if($_POST['valida_testes'] > 0){


		 
		$sql = "update usuario_has_fase set flag_fase = 1 where id_usuario = ".$_SESSION['id_usuario']." and id_fase = (SELECT id_fase from fase where numero_fase > '".$_POST['numero_fase']."' and id_area = ".$_POST['idarea']." order by id_fase asc limit 1)";
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	


		


		 
		 
		}
		

	
 ?>	