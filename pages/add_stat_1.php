<!DOCTYPE html>
<meta charset="UTF-8">

<?php

	$IG = $_GET['IG'];
	$MEC = $_GET['MEC'];
	$EAC = $_GET['EAC'];
	$GPSI = $_GET['GPSI'];
	$TUR = $_GET['TUR'];
	$GEST = $_GET['GEST'];
	
	
	  
  $connection = mysqli_connect('127.0.0.1','root','rootroot');
  
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

  $db = mysqli_select_db($connection,'pap');
	

	$check = mysqli_query($connection, $q_check = "select * from estatistica where tipo=1");
	if (mysqli_num_rows($check)<=0){
		
		$string="INSERT INTO estatistica (idestatistica, val1, val2, val3, val4, val5, val6, tipo, estado) VALUES (1, $IG, $MEC, $EAC, $GPSI, $TUR, $GEST, 1, 'publicada')";
	}else{
		
		$string = "Update estatistica set val1 = $IG , val2 = $MEC, val3 = $EAC , val4 = $GPSI , val5 = $TUR , val6 = $GEST, estado='publicada' where tipo=1";
	}
	
	
	//echo $string;
	
	mysqli_query($connection, $string) or die(mysqli_connect_error());
	
	echo"<script language='javascript' type='text/javascript'>alert('Estatística publicada com sucesso!');window.location.href='estatisticas_pub.php';</script>";	
	
	die();

?>