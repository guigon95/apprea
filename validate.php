<?php


include ('database.php');

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$stmt = $pdo->prepare("SELECT * FROM usuario WHERE email_usuario = ? and senha_usuario = ?");
$stmt->bindParam(1,$email);
$stmt->bindParam(2,$senha);
$stmt->execute();


if($stmt->rowCount() == 1){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['email_usuario'] = $row['email_usuario'];
            $_SESSION['senha_usuario'] = $row['senha_usuario'];
            $_SESSION['nome_usuario'] = $row['nome_usuario'];
            $_SESSION['introducao_arduino'] = $row['introducao_arduino'];

           header('Location: index.php');
        }
      }
    else{
    	unset($_SESSION['email_usuario']);
      	unset($_SESSION['senha_usuario']);
    	session_destroy();

    	header('Location: login.php');
       
    }
?>

