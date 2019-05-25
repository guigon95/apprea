<?php


include ('database.php');

session_start();


$email = null;
$senha = null;

if(isset($_POST['email']))
$email = $_POST['email'];

if(isset($_POST['senha']))
$senha = $_POST['senha'];


echo ($email);
echo ($senha);
echo ("teste");

$stmt = $pdo->prepare("SELECT * FROM usuario WHERE email_usuario = ? and senha_usuario = ?");
$stmt->bindParam(1,$email);
$stmt->bindParam(2,$senha);
$stmt->execute();


if($stmt->rowCount() == 1){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo ("Id: ".$row['id_usuario']);
            echo ("E-mail".$row['email_usuario']);
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['email_usuario'] = $row['email_usuario'];
            $_SESSION['senha_usuario'] = $row['senha_usuario'];
            $_SESSION['nome_usuario'] = $row['nome_usuario'];
            $_SESSION['introducao_arduino'] = $row['introducao_arduino'];
            $_SESSION['id_patente'] = $row['id_patente'];
            $_SESSION['admin'] = $row['admin'];

           header('Location: index.php');
        }
      }
    else{

    	unset($_SESSION['email_usuario']);
      	unset($_SESSION['senha_usuario']);
    	session_destroy();

    	header('Location: login.php?error=1');
       
    }
?>

