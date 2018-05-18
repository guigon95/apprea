<?php 

	require_once ('database.php');

	function find($table, $id, $table_id){

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

 ?>