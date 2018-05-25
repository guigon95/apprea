<?php 

	require_once ('database.php');

	$sql = "update usuario_has_introducao set flag_introducao = 0 where id_usuario = 2";
	$rs = $GLOBALS['pdo']->prepare($sql);
	$rs->execute();	
	
	

 ?>	