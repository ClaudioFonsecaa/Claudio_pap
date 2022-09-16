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
		<link rel="shortcut icon" href="../img/favicon.ico" >
		<title>Estatísticas</title>
		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 <h1 align='center' >Estatísticas</h1>
		 <img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		 
		 <div align='center '>
		 
		 <br><br><br><br><br>
		 
		 <h3>Ver Estatísticas Publicadas</h3>
		 
		 <a href='estatisticas_pub.php'> 
		 <img id='alter_icon' src='../img/estat.png'>
		 </a>
		
		<br><br><br><br><br>
		
		<img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		
		<br><br><br><br><br>
		
		<?php if($_SESSION['userLevel']=='3'){
			
		echo "
		
		<h3>Criar Nova Estatística</h3>
		
		<a href='criar_stat.php'> 
		<img id='alter_icon' src='../img/add_estat.png'>
		</a>
		
		<br><br><br><br><br>
		
		<img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		
		";
		
		} ?>

		</div>
		 
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

