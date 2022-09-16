<!DOCTYPE html>
<meta charset="UTF-8">

<?php
session_start();

include "connect.php";

	
	$id = $_GET['id'];
	
	
	$query2 =" DELETE FROM propostas WHERE  idpropostas= $id and utilizadores_idutilizador= $_SESSION[userID]";
	
	//echo $query2;
	
	$resultado = mysqli_query($connection, $query2);

if(!$resultado){
echo 'erro';}
else{
echo "<script>alert('Proposta apagada com sucesso!');top.location.href='inicio.php';</script>";
}

?>