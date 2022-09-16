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
		
		
		$id=$_GET['id'];
		

		?>
		
		<div class="pagina">
		
		 <div class="form">
		 
		 <form class="login-form" method="POST" action="escolherAluno2.php?id=<?php echo $id?> ">
		 
		 <h3 align="justify" >De modo a poder-nos ajudar na recolha de informação usada para estatísticas, responda ao seguinte questionário.<h3>
		 
		 <br>
		 
		 <h4> A vaga em questão foi preenchida com a ajuda da plataforma?</h4>
		 <select id="vaga" name="vaga" required="">
				<option value="">Selecione sim ou não</option>
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
		</select>
		 
		 <input type="submit" value="SUBMETER" id="botoes" name="submeter"><br>
		 
		 </form>
		
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

