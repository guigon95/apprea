<?php 

	require_once ('../../database.php');

	session_start();
	
		

		if(isset($_FILES['inputFile']['name'])){

		//$fileName = $_POST['inputFile_name'];
		//$tmpName  = $_POST['inputFile']['tmp_name'];
		//$fileSize = $_POST['inputFile_size'];
		//$fileType = $_POST['inputFile_type'];

		echo ($_FILES['inputFile']['name']);
		echo ($_FILES['inputFile']['tmp_name']);

		$now = new DateTime();
		//$now->format('Y-m-d H:i:s');    // MySQL datetime format
		$dataAtual = $now->getTimestamp();  
		move_uploaded_file($_FILES['inputFile']['tmp_name'], "upload/".$dataAtual.$_SESSION['id_usuario'].$_SESSION['nome_usuario'].$_FILES['inputFile']['name']);

		 
		//$fp      = fopen($tmpName, 'r');
		//$content = fread($fp, filesize($tmpName));
		///$content = addslashes($content);
		//fclose($fp);
		 
		//if(!get_magic_quotes_gpc())
		//{
		//    $fileName = addslashes($fileName);
		//}
		
		$id_usuario = 2/
		$sql = "update usuario_has_fase set flag_fase = 2 where id_usuario = ".$_SESSION['id_usuario']." and id_fase = ". $_POST['id_fase'];
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	

		$sql = "update usuario_has_fase set flag_fase = 1 where id_usuario = ".$_SESSION['id_usuario']." and id_fase = (SELECT id_fase from fase where numero_fase > '".$_POST['numero_fase']."' order by id_fase asc limit 1)";
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	


		 
		}
		

	
 ?>	