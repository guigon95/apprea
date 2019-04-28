<?php

        session_start();

    	unset($_SESSION['email_usuario']);
      	unset($_SESSION['senha_usuario']);
    	session_destroy();

    	header('Location: login.php');
    
?>

