<?php 

	require_once ('../../database.php');

	echo "registrando...";

	if(isset($_POST['email'])){

		$sql = "SELECT * FROM usuario";
		$sql = $sql." WHERE email_usuario = ?";
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->bindParam(1, $_POST['email']);
			$rs->execute();
		
		if($rs->rowCount() == 0){

			if($_POST['senha'] == $_POST['confirmar']){
				$sql = "INSERT INTO usuario (nome_usuario, sobrenome_usuario, email_usuario, senha_usuario, introducao_arduino) VALUES (?, ?, ?, ?, ?)";
				$rs = $GLOBALS['pdo']->prepare($sql);
				$rs->bindParam(1, $_POST['nome']);
				$rs->bindParam(2, $_POST['sobrenome']);
				$rs->bindParam(3, $_POST['email']);
				$rs->bindParam(4, $_POST['senha']);
				$rs->bindParam(5, 0);
				$rs->execute();	

				header('location: ../login.php');
			}
			else{
				header('location: ../register.php?erro=2');
			}	
		}
		else {
			header('location: ../register.php?erro=1');
		}
	}
	
	

 ?>	