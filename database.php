<?php 

	$pdo = new PDO('mysql:host=localhost;dbname=apprea', 'root', 'root');
	$pdo->exec("SET CHARACTER SET utf8");	
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	?>