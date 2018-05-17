<?php 

	$pdo = new PDO('mysql:host=us-cdbr-iron-east-04.cleardb.net;dbname=heroku_7ce8565c5f375ca', 'b86e0689e91634', '7e72b5c8');
	$pdo->exec("SET CHARACTER SET utf8");	
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	?>