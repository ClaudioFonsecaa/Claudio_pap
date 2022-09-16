<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>


<!DOCTYPE html>

<html>
<head>

  <title>Estatísticas</title>
  
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  
  <link type="text/css" rel="stylesheet" href="../css/style.css"/>
  
  <link rel="shortcut icon" href="../img/favicon.ico" >
<title>Estatísticas</title>
  
 
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	
</head>

<body>

	<?php include 'header.php';?>

	<div id="titulo">
		
	</div>
	<div class="pagina">
		<div class="form">
		
		
		
		 <a href="criar_stat.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
		
		<br><br><br><br>
		
		<h2>Nº de Alunos empregados nas várias áreas</h2><br>
	
		<h5>Nº de alunos de</h5>
		
		<form class="login-form" method="POST" action="charts.php">
	
		<input type="text" placeholder="Informática de Gestão" name="IG" onkeypress='return isNumberKey(event)' required="" />
		<input type="text" placeholder="Manutenção Industrial / Mecatrónica" onkeypress='return isNumberKey(event)' name="MEC" required=""/>
		<input type="text" placeholder="Eletrónica, Automação e comando" onkeypress='return isNumberKey(event)' name="EAC" required=""/>
		<input type="text" placeholder="Gestão e programação de sistemas informáticos" onkeypress='return isNumberKey(event)' name="GPSI" required=""/>
		<input type="text" placeholder="Turismo" name="TUR" onkeypress='return isNumberKey(event)' required=""/>
		<input type="text" placeholder="Gestão" name="GEST" onkeypress='return isNumberKey(event)' required=""/><br><br>
		
		<button type="reset">
			<img src="../img/clean.png" alt="" />
		</button>
		
		<br><br>
		
		<input type="submit" value="SUBMETER" id="botoes" name="submeter"><br>
		
	  
		</form>
		

	 
		</div>
	</div>
	
	<script>
	
	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
	}
	
	</script>
	
	<?php include 'footer.php';?>
	
</body>
</html>

<?php

	}else{
	echo "<script>alert('Inicie Sessão primeiro!');top.location.href='../index.html';</script>";
	}
?>

