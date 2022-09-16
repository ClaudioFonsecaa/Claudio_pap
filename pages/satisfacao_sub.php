<!DOCTYPE html>
<meta charset="UTF-8">

<?php 

session_start();

  $id = $_GET['id'];

  $utilizador = $_SESSION["userID"];
  
  $one = $_POST['comp_tec'];
  $two = $_POST['plan_orga'];
  $three = $_POST['respon_auto'];
  $four = $_POST['comunic_rela_inter'];
  $five = $_POST['trab_equipa'];
  $six = $_POST['totais'];
  
  
  $connection = mysqli_connect('127.0.0.1','root','rootroot');
  
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

  $db = mysqli_select_db($connection,'pap');
  

 if (isset ($_POST['submeter'])) { 
	//$string= "update satisfacao set (`totais`, nome_satisf, utilizadores_idutilizador, preenchido)
	//VALUES ('$one', '$two', '$three', '$four', '$five', '$six', '$id', '$utilizador', 'Sim')";
	
	$string = "update satisfacao set comp_tecnicas ='$one' , planeamento_organizacao = '$two' , responsabilidade_autonomia = '$three' , comunicacao_relacoes_interpessoais = '$four' , trabalho_equipa = '$five' ,
	totais = '$six',  nome_satisf = '$id',  utilizadores_idutilizador = '$utilizador', preenchido = 'Sim' ";
	
	mysqli_query($connection, $string) or die(mysqli_connect_error());
	
echo"<script language='javascript' type='text/javascript'>alert('Inquérito concluído com sucesso!');window.location.href='notificacao.php';</script>";	
  die();


	}

?>