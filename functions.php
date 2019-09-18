<?php 

	require_once ('database.php');

	 function save_item($post, $id = null, $id2 = null){
			$array = array();
			if(empty($id)){
				$sql = "INSERT INTO ".$post['tabela']." (`id`, `name`) VALUES (NULL, ?)";
				$rs = $GLOBALS['pdo']->prepare($sql);
				$rs->bindParam(1, $post['name']);
				try{
					$rs->execute();
				}
				catch (PDOException $e) {
					die(error($e, $sql));
				}
			}
			else if(!empty($id2)){
				$sql = "UPDATE ".$post['tabela']." SET ".$post['campo']." = ? WHERE id_".$post['tabela_id']." = ?  and id_".$post['tabela_id2']." = ?";
				$rs = $GLOBALS['pdo']->prepare($sql);
				$rs->bindParam(1, $post['valor']);
				$rs->bindParam(2, $id);
				$rs->bindParam(3, $id2);
				try{
					$rs->execute();
				}
				catch (PDOException $e) {
					die(error($e, $sql));
				}

			}
			else{
				$sql = "UPDATE ".$post['tabela']." SET ".$post['campo']." = ? WHERE id = ?";
				$rs = $GLOBALS['pdo']->prepare($sql);
				$rs->bindParam(1, $post['valor']);
				$rs->bindParam(2, $id);
				try{
					$rs->execute();
				}
				catch (PDOException $e) {
					die(error($e, $sql));
				}
			}
			$array['success'] = 'true';
			return $array;
		}

	function find2id($table, $id1, $id2, $table_id1, $table_id2){

		$sql = "SELECT * FROM " . $table . " WHERE id_". $table_id1 ." = ? and id_". $table_id2 ." = ?";

		$rs = $GLOBALS['pdo']->prepare($sql);
		$rs->bindParam(1, $id1);
		$rs->bindParam(2, $id2);

		try{
			if($rs->execute()){
				if ($rs->rowCount() == 1) {
					return $rs->fetch(PDO::FETCH_ASSOC);
				}
				else if($rs->rowCount() > 1) {
					return $rs->fetchAll(PDO::FETCH_ASSOC);
				}
				else{
					return null;
				}
			}
		} 	catch (PDOException $e) {
				die(error($e, $sql));
			}
			
	}

	function find($table, $id = null, $table_id = null){

		$sql = "SELECT * FROM " . $table;
		

		if(empty($id)){
			$rs = $GLOBALS['pdo']->prepare($sql);
		}
		else{
			$sql = $sql." WHERE id_".$table_id." = ?";
			$rs = $GLOBALS['pdo']->prepare($sql);
			$rs->bindParam(1, $id);	
		}
		
		try{

			if ($rs->execute()) {
				if($rs->rowCount() > 1){
						return $rs->fetchAll();
				}
				elseif($rs->rowCount() == 1){
						return $rs->fetch(PDO::FETCH_ASSOC);
				}
				else{
					return null;
				}
			}
		} catch (PDOException $e) {
				die(error($e, $sql));
			}
	}


	function findUsuariosOrdenados(){

		$sql = "SELECT * FROM usuario f  ORDER BY f.nome_usuario asc";

		$rs = $GLOBALS['pdo']->prepare($sql);
	
		try{

			if ($rs->execute()) {
				if($rs->rowCount() > 1){
						return $rs->fetchAll();
				}
				elseif($rs->rowCount() == 1){
						return $rs->fetch(PDO::FETCH_ASSOC);
				}
				else{
					return null;
				}
			}
		} catch (PDOException $e) {
				die(error($e, $sql));
		}
	}

	function findRankingPatente(){

		$sql = "SELECT * FROM usuario t where t.admin != 1 ORDER BY t.id_patente DESC";
		

		$rs = $GLOBALS['pdo']->prepare($sql);
		
		
		try{

			if ($rs->execute()) {
				if($rs->rowCount() > 1){
						return $rs->fetchAll();
				}
				elseif($rs->rowCount() == 1){
						return $rs->fetch(PDO::FETCH_ASSOC);
				}
				else{
					return null;
				}
			}
		} catch (PDOException $e) {
				die(error($e, $sql));
			}
	}


	function findRankingGeral(){

		$sql = "SELECT f.id_usuario, sum(f.nota) FROM usuario_has_fase f where admin != 1 GROUP BY f.id_usuario ORDER BY sum(f.nota) DESC";

		$rs = $GLOBALS['pdo']->prepare($sql);
	
		try{

			if ($rs->execute()) {
				if($rs->rowCount() > 1){
						return $rs->fetchAll();
				}
				elseif($rs->rowCount() == 1){
						return $rs->fetch(PDO::FETCH_ASSOC);
				}
				else{
					return null;
				}
			}
		} catch (PDOException $e) {
				die(error($e, $sql));
		}
	}

	function findRankingNota(){

		$sql = "SELECT f.id_usuario, sum(f.nota) FROM usuario_has_fase f, usuario u where u.id_usuario = f.id_usuario and u.admin != 1 GROUP BY f.id_usuario ORDER BY sum(f.nota) DESC";

		$rs = $GLOBALS['pdo']->prepare($sql);
	
		try{

			if ($rs->execute()) {
				if($rs->rowCount() > 1){
						return $rs->fetchAll();
				}
				elseif($rs->rowCount() == 1){
						return $rs->fetch(PDO::FETCH_ASSOC);
				}
				else{
					return null;
				}
			}
		} catch (PDOException $e) {
				die(error($e, $sql));
			}
	}

	function findAlunos(){

		$sql = "SELECT * FROM usuario u WHERE u.admin = o ORDER BY u.nome_usuario ASC";

		$rs = $GLOBALS['pdo']->prepare($sql);
	
		try{

			if ($rs->execute()) {
				if($rs->rowCount() > 1){
						return $rs->fetchAll();
				}
				elseif($rs->rowCount() == 1){
						return $rs->fetch(PDO::FETCH_ASSOC);
				}
				else{
					return null;
				}
			}
		} catch (PDOException $e) {
				die(error($e, $sql));
			}
	}
 ?>