<!DOCTYPE html>
<meta charset="UTF-8">

<?php
session_start();

include "connect.php";

	
	$id = $_GET['id'];
	
	$query2 = "DELETE FROM `estatistica` WHERE `idestatistica`= '$id';";
	
	$resultado = mysqli_query($connection, $query2);

if(!$resultado){
echo 'erro';}
else{
echo "<script>alert('Estatística apagada com sucesso!');top.location.href='estatisticas_pub.php';</script>";
}

?>