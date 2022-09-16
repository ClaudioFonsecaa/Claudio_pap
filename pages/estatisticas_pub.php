<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		

		
		<?php include 'stat1.php';?>
		<?php include 'stat2.php';?>
		<?php include 'stat3.php';?>
		
		
		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 <link rel="shortcut icon" href="../img/favicon.ico" >
		<title>Estatísticas</title>
		 
		
		 <a href="estatisticas.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
		
		<br><br><br><br>
		
		
		<?php
		
		$query = "select * from estatistica where idestatistica=1";
		$result = mysqli_query($connection, $query) or die("Error: ".mysqli_error($connection));
		$dado = mysqli_fetch_array($result);
		
		$query2 = "select * from estatistica where idestatistica=2";
		$result2 = mysqli_query($connection, $query2) or die("Error: ".mysqli_error($connection));
		$dado2 = mysqli_fetch_array($result2);
		
		$query3 = "select * from estatistica where idestatistica=3";
		$result3 = mysqli_query($connection, $query3) or die("Error: ".mysqli_error($connection));
		$dado3 = mysqli_fetch_array($result3);

		if($dado['estado']=='publicada'){
		
		if($_SESSION['userLevel']==3){
		echo "
		<br><br>
		
		<a href='apagar_stat.php?id=1'> 
			<img id='add_icon' src='../img/DEL_stat.png' alt='back_arrow' title='Apagar Estatística'>
		</a>
		
		<br><br><br><br>
		
		
		";
		}
		
		echo "
		
		 <div id='piechart2' style='width: 900px; height: 500px;'>
		 </div>
		 
		 
		";
		}
		
		
		if($dado2['estado']=='publicada'){
		
		if($_SESSION['userLevel']==3){
		echo "
		<a href='apagar_stat.php?id=2'> 
			<img id='add_icon' src='../img/DEL_stat.png' alt='back_arrow' title='Apagar Estatística'>
		</a>
		
		
		
		
		";
		}
		
		
			echo "
		<br><br><br><br>
		 
		 <div id='piechart' style='width: 900px; height: 500px;'></div>
		 

		 ";
		}

		
		if($dado3['estado']=='publicada'){
		
		
		if($_SESSION['userLevel']==3){
		echo "
		<a href='apagar_stat.php?id=3'> 
			<img id='add_icon' src='../img/DEL_stat.png' alt='back_arrow' title='Apagar Estatística'>
		</a>
		
		
		
		
		";
		}
		
		
		
			echo "
		<br><br><br><br>
		 
		 <div id='piechart3' style='width: 900px; height: 500px;'></div>
		 

		 ";
		}
		 
	?>	

		 </div>
		 
		 </div>

	
	
		<?php include 'footer.php';?>
		
		
		</body>
		
	</html>
	
<?php

	}else{
	echo "<script>alert('Inicie Sessão primeiro!');top.location.href='../index.html';</script>";
	}
?>

