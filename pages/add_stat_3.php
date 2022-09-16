<!DOCTYPE html>
<meta charset="UTF-8">

<?php

	$EMP = $_GET['EMP'];
	$DIP = $_GET['DIP'];
	$OUTRO = $_GET['OUTRO'];
	
  $connection = mysqli_connect('127.0.0.1','root','rootroot');
  
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

  $db = mysqli_select_db($connection,'pap');
	

		$check = mysqli_query($connection, $q_check = "select * from estatistica where tipo=3");
	if (mysqli_num_rows($check)<=0){
		
		$string="INSERT INTO estatistica (idestatistica, val1, val2, val3, tipo, estado) VALUES (3, $EMP, $DIP, $OUTRO, '3', 'publicada')";
	
	}else{
		
		$string = "Update estatistica set val1=$EMP, val2=$DIP, val3=$OUTRO, estado='publicada'  where tipo=3";
	}
	
	
	mysqli_query($connection, $string) or die(mysqli_connect_error());
	
	echo"<script language='javascript' type='text/javascript'>alert('Estatística publicada com sucesso!');window.location.href='estatisticas_pub.php';</script>";	
	
	die();

?>