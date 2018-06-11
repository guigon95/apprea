<?php 

	require_once ('../../database.php');

	session_start();
	
		

		if($_POST['inputFile_size'] > 0){

		$fileName = $_POST['inputFile_name'];
		//$tmpName  = $_POST['inputFile']['tmp_name'];
		$fileSize = $_POST['inputFile_size'];
		$fileType = $_POST['inputFile_type'];

		 
		//$fp      = fopen($tmpName, 'r');
		//$content = fread($fp, filesize($tmpName));
		///$content = addslashes($content);
		//fclose($fp);
		 
		//if(!get_magic_quotes_gpc())
		//{
		//    $fileName = addslashes($fileName);
		//}
		
		 
		$sql = "update usuario_has_fase set flag_fase = 2 where id_usuario = ".$_SESSION['id_usuario']." and id_fase = ". $_POST['id_fase'];
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	

		$sql = "update usuario_has_fase set flag_fase = 1 where id_usuario = ".$_SESSION['id_usuario']." and id_fase = (SELECT id_fase from fase where numero_fase > '".$_POST['numero_fase']."' order by id_fase asc limit 1)";
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	


		 
		 
		echo "<br>File $fileName uploaded<br>";
		}
		

	
 ?>	