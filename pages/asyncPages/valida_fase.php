<?php 

	require_once ('../../database.php');

	session_start();
	
		$flag_patente = $_SESSION['flag_patente'];

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
		$nomeArquivo = $dataAtual.$_SESSION['id_usuario'].$_SESSION['nome_usuario'].$_FILES['inputFile']['name'];
		move_uploaded_file($_FILES['inputFile']['tmp_name'], "upload/".$nomeArquivo);


		
		$sql = "update usuario_has_fase set flag_fase = 2, nome_arquivo = '".$nomeArquivo."', tipo = '".$_FILES['inputFile']['type']."', tamanho ='".$_FILES['inputFile']['size']."' where id_usuario = ".$_SESSION['id_usuario']." and id_fase = ". $_POST['id_fase'];
		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->execute();	


		if ($_POST['id_area'] == 12) {
			$sql = "update usuario_has_fase set flag_fase = 1 where id_usuario = ".$_SESSION['id_usuario']." and id_fase = (SELECT id_fase from fase where numero_fase = '".$_POST['numero_fase']."' and id_area = ". $_POST['id_area'] ." order by id_fase asc limit 1)";
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();	
		}
		/*else if ($_POST['id_area'] == 22) {
			$sql = "update usuario_has_fase set flag_fase = 1 where id_usuario = ".$_SESSION['id_usuario']." and id_fase = (SELECT id_fase from fase where numero_fase > '".$_POST['numero_fase']."' and id_area = '12' order by id_fase asc limit 1)";
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
		}*/
			

		if($_POST['numero_fase'] == 1 && $_POST['id_area'] == 12 && $_SESSION['id_patente'] == 2){
			$sql = "update usuario set flag_patente = 1, id_patente = 12 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		else if($_POST['numero_fase'] == 3 && $_POST['id_area'] == 22 && $_SESSION['id_patente'] == 12){
			$sql = "update usuario set flag_patente = 1, id_patente = 22 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		else if($_POST['numero_fase'] == 4 && $_POST['id_area'] == 22 && $_SESSION['id_patente'] == 22){
			$sql = "update usuario set flag_patente = 1, id_patente = 32 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		/*else if($_POST['numero_fase'] == 3 && $_POST['id_area'] == 12 && $_SESSION['id_patente'] == 12){
			$sql = "update usuario set flag_patente = 1, id_patente = 22 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		else if($_POST['numero_fase'] == 1 && $_POST['id_area'] == 22 && $_SESSION['id_patente'] == 2){
			$sql = "update usuario set flag_patente = 1, id_patente = 12 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		else if($_POST['numero_fase'] == 3 && $_POST['id_area'] == 22 && $_SESSION['id_patente'] == 12){
			$sql = "update usuario set flag_patente = 1, id_patente = 22 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		else if($_POST['numero_fase'] == 2 && $_POST['id_area'] == 12 && $_SESSION['id_patente'] == 22){
			$sql = "update usuario set flag_patente = 1, id_patente = 32 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		else if($_POST['numero_fase'] == 2 && $_POST['id_area'] == 22 && $_SESSION['id_patente'] == 22){
			$sql = "update usuario set flag_patente = 1, id_patente = 32 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		else if($_POST['numero_fase'] == 2 && $_POST['id_area'] == 32 && $_SESSION['id_patente'] == 22){
			$sql = "update usuario set flag_patente = 1, id_patente = 32 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		else if($_POST['numero_fase'] == 1 && $_POST['id_area'] == 32 && $_SESSION['id_patente'] == 2){
			$sql = "update usuario set flag_patente = 1, id_patente = 12 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}
		else if($_POST['numero_fase'] == 3 && $_POST['id_area'] == 32 && $_SESSION['id_patente'] == 12){
			$sql = "update usuario set flag_patente = 1, id_patente = 22 where id_usuario = ".$_SESSION['id_usuario'];
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->execute();
			validaPatente();
		}*/



		 
		}

		function validaPatente(){

			if($_SESSION['id_patente'] == 2){
				$_SESSION['id_patente'] = 12;
				$_SESSION['flag_patente'] = 1;
			}
			else if ($_SESSION['id_patente'] == 12) {
				$_SESSION['id_patente'] = 22;
				$_SESSION['flag_patente'] = 1;
			}
			else if ($_SESSION['id_patente'] == 22) {
				$_SESSION['id_patente'] = 32;
				$_SESSION['flag_patente'] = 1;
			}
		}
		

	
 ?>	