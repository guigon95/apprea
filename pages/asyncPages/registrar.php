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
				$sql = "INSERT INTO usuario (nome_usuario, sobrenome_usuario, email_usuario, senha_usuario, introducao_arduino) VALUES (?, ?, ?, ?, 0)";
				$rs = $GLOBALS['pdo']->prepare($sql);
				$rs->bindParam(1, $_POST['nome']);
				$rs->bindParam(2, $_POST['sobrenome']);
				$rs->bindParam(3, $_POST['email']);
				$rs->bindParam(4, $_POST['senha']);
				$rs->execute();	

				$sql = "SELECT * FROM usuario";
				$sql = $sql." WHERE email_usuario = ?";
				$rs = $GLOBALS['pdo']->prepare($sql);
				$rs->bindParam(1, $_POST['email']);
				$rs->execute();
				$rows_user = $rs->fetch(PDO::FETCH_ASSOC);

				$sql = "select * from fase";
				$rs = $GLOBALS['pdo']->prepare($sql);
				$rs->execute();
				$rows_fase = $rs->fetchAll(PDO::FETCH_ASSOC);

				foreach ($rows_fase as $key => $value) {
					
					$sql = "INSERT INTO usuario_has_fase (id_usuario, id_fase, flag_fase) values (". $rows_user['id_usuario']. ", " . $value['id_fase'] . ", 0)";
					$rs = $GLOBALS['pdo']->prepare($sql);
					$rs->execute();
				}

				$sql = "select * from fase where numero_fase = '1'";
				$rsIdFase = $GLOBALS['pdo']->prepare($sql);
				$rsIdFase->execute();

				while ($rowsIdFase = $rsIdFase->fetch(PDO::FETCH_ASSOC)) {
					$sql = "update usuario_has_fase set flag_fase = 1 where id_usuario = ".$rows_user['id_usuario']." and id_fase = ".$rowsIdFase['id_fase'];
					$rs = $GLOBALS['pdo']->prepare($sql);
					$rs->execute();
				}
				

				$sql = "select * from area";
				$rs = $GLOBALS['pdo']->prepare($sql);
				$rs->execute();
				//$rows_fase = $rs->fetchAll(PDO::FETCH_ASSOC);
				$rows_area = $rs->fetchAll(PDO::FETCH_ASSOC);

				foreach ($rows_area as $key => $value) {
					
					$sql = "INSERT INTO usuario_has_area (id_usuario, id_area, flag_introducao) values (". $rows_user['id_usuario']. ", " . $value['id_area'] . ", 0)";
					$rs = $GLOBALS['pdo']->prepare($sql);
					$rs->execute();
				}
				
				header('location: ../../login.php');
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