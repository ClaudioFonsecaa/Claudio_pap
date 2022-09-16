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
		<title>Criar Estatísticas</title>
	
		
		</head>
		<body>
		
	
		<?php include 'header.php';
			
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 <a href="estatisticas.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
		
		<br><br><br><br>
		
		<img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		
		<br><br><br><br>
		
		<a href="estatistica1.php" style='text-decoration:none'>
		<h2 align="center" >Nº de Alunos empregados nas várias áreas</h2>
		</a>
		
		<br><br><br><br>
		
		<img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		
		<br><br><br><br>
		
		<a href="estatistica2.php" style='text-decoration:none'>
		<h2 align="center" >Taxa de Conclusão</h2>
		</a>
		
		<br><br><br><br>
		
		<img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		
		<br><br><br><br>
		
		<a href="estatistica3.php" style='text-decoration:none'>
		<h2 align="center" >Taxa de Empregabilidade</h2>
		</a>
		
		<br><br><br>
		
		<img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		
		 
		 
		 </div>
		 
		 </div>
		

		
		
		</div>
		<?php include 'footer.php';?>
		</div>
		
		</body>
		
	</html>
	
<?php

	}else{
	echo "<script>alert('Inicie Sessão primeiro!');top.location.href='../index.html';</script>";
	}
?>

