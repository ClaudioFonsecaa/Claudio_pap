<!DOCTYPE html>
<meta charset="UTF-8">

<?php

	$CON = $_GET['CON'];
	$NCON = $_GET['NCON'];
	
  $connection = mysqli_connect('127.0.0.1','root','rootroot');
  
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

  $db = mysqli_select_db($connection,'pap');
	
	$q_check = "select * from estatistica where tipo=2";

	if (mysqli_num_rows($check = mysqli_query($connection, $q_check))>0){
		
		$string = "Update estatistica set val1=$CON, val2=$NCON, estado='publicada'  ";
		//echo $string;
		
	}else{
		$string="INSERT INTO estatistica (idestatistica, val1, val2, tipo, estado) VALUES (2, $CON, $NCON, '2', 'publicada')";
		//echo $string;
		
	}
	
	
	mysqli_query($connection, $string) or die(mysqli_connect_error());
	
	echo"<script language='javascript' type='text/javascript'>alert('Estatística publicada com sucesso!');window.location.href='estatisticas_pub.php';</script>";	
	
	die();

?>