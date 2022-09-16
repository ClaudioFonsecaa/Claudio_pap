<!DOCTYPE html>
<meta charset="UTF-8">

<?php
session_start();

include "connect.php";


	$nome = $_POST['nome_aluno'];
	$area = $_POST['area_aluno'];
	$texto = "A empresa $_SESSION[user], contratou o aluno $nome, da area de $area";
	
	
	$id = $_GET['id'];
	$vaga = $_GET['vaga'];
	$userID = $_SESSION['userID'] ;
	
	if($vaga=='Sim'){
	$query = "INSERT into notifications (data, nome_not, texto, area_not, utilizadores_idutilizador) values (NOW(), '$nome', '$texto', '$area', '" . $_SESSION['userID'] . "') ";

	mysqli_query($connection, $query);
	
	$query2 = "INSERT into satisfacao (nome_satisf, preenchido, utilizadores_idutilizador) values ('$nome', 'Não', '$userID') ";

	//echo $query2;
	
	mysqli_query($connection, $query2);
	//query necessaria para as estatisticas
	
	}else{
		
		
	//query necessaria para as estatisticas
	}
	
	$query2 =" DELETE FROM propostas WHERE  idpropostas= $id and utilizadores_idutilizador= $_SESSION[userID]";
	
	
	$resultado = mysqli_query($connection, $query2);

if(!$resultado){
echo 'erro';}
else{
echo "<script>alert('Obrigado!, Proposta apagada com sucesso!');top.location.href='notificacao.php';</script>";
}

?>