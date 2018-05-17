<?php


class ModelLogin{

		public function query($data){
			return DB::sql("SELECT * FROM usuario WHERE email = :email , id = :id", a'id' => $data['']);
		}
	}


?>