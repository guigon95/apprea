<?php 

	require_once ('database.php');

	function find($table){

		$sql = "SELECT * FROM " . $table;

		$rs = $GLOBALS['pdo']->prepare($sql);
		try{

			if ($rs->execute()) {
				if($rs->rowCount() > 0){
						return $rs->fetchAll();
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