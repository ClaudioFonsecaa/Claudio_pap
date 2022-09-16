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
		<title>Questionário</title>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		</head>
		<body>
		
		<?php include 'header.php';
		
		
		$idProposta=$_GET['id'];
		$vaga = $_POST['vaga'];
		
		
		if($vaga=='Sim')
		{
		?>
		
		<div class="pagina">
		
		 <div class="form">
		 
		
		 <h4> Indique-nos por favor o nome e a área do aluno selecionado para a vaga </h4>
		 
		 <form class="login-form" method="POST" action="apagarProposta.php?id=<?php echo $idProposta?>&vaga=<?php echo$vaga?>">
		 
		 <input placeholder="Escreva o nome do aluno" required id="nome_aluno" name="nome_aluno"></input>
		 
		 <select id="curso" name="area_aluno" required>
				<option value="">Curso</option>
				<option value="IG">Informática de Gestão</option>
				<option value="MEC">Manutenção Industrial/Mecatrónica</option>
				<option value="EAC">Eletrónica, Automação e Comando</option>
				<option value="GPSI">Gestão e Programação de Sistemas Informáticos</option>
				<option value="TUR">Turismo</option>
				<option value="GEST">Gestão</option>
		  </select>
		 
		 <input type="submit" value="SUBMETER" id="botoes" name="submeter"><br>
		 
		 </form>
		 
		 
		 </div>
		 
		 </div>
	
		<?php 
		
		}else{
			
		
			echo "<script>top.location.href='apagarProposta2.php?id=$idProposta';</script>";
		}
		
		
		include 'footer.php';?>
		
		</body>
		
	</html>
	
<?php

	}else{
	echo "<script>alert('Inicie Sessão primeiro!');top.location.href='../index.html';</script>";
	}
?>

