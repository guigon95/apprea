<?php 

	require_once ('../../database.php');

	session_start();

	if(isset($_POST['valor'])){
		$sql = "update usuario set introducao_arduino = 1 where id_usuario = ".$_SESSION['id_usuario'];
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	

		$_SESSION['introducao_arduino'] = 1;
	}
	
	

 ?>	