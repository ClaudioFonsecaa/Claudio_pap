<!DOCTYPE html>
<meta charset="UTF-8">

<?php 

session_start();


$titulo = $_POST['titulo'];
  
  $texto = $_POST['texto'];
  
  $expiracao = $_POST['expiracao'];
  
  $vinculo = $_POST['vinculo'];
  
  $curso = $_POST['curso'];
  
  $estado = 'ativa';
  
  $utilizador = $_SESSION["user"];
   
  
  $connection = mysqli_connect('127.0.0.1','root','rootroot');
  
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

  $db = mysqli_select_db($connection,'pap');
  
 

 if (isset ($_POST['postar'])) { 
	$string="INSERT INTO propostas (titulo, texto, data, expiracao, vinculo, estado, curso, utilizador, utilizadores_idutilizador) 
  VALUES ('$titulo', '$texto', NOW(),'$expiracao', '$vinculo', '$estado', '$curso', '$utilizador', '" . $_SESSION['userID'] . "')";
	
	mysqli_query($connection, $string) or die(mysqli_connect_error());
	
echo"<script language='javascript' type='text/javascript'>alert('Proposta postada com sucesso!');window.location.href='inicio.php';</script>";	
  die();


	}

?>