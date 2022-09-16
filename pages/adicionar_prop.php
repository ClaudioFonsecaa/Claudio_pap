<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<title>Adicionar Proposta</title>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		
		
		</head>
		<body>
		
		
		<!-- ------------------------------- Estilo do formulario -->
		
		<style>
input[type=text], select {
      font-family: "Roboto", sans-serif;
  outline: 0;
  background: #D3D3D3;
  width: 100%;
  border: 0;
  margin: 0 0 10px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

input[type=date], select {
      font-family: "Roboto", sans-serif;
  outline: 0;
  background: #D3D3D3;
  width: 100%;
  border: 0;
  margin: 0 0 10px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

input[type=submit] {
      font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

textarea {
	font-family: "Roboto", sans-serif;
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #D3D3D3;
    font-size: 16px;
    resize: none;
}

#short_text{
	text-align: left;
	font-family: "Roboto", sans-serif;
	color: #4CAF50;
}

</style>
		
		
		
		

		<?php include 'header.php';
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		
		<a href="inicio.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
			
		
		<h1 align='center'> Adicionar Proposta </h1>
		
		<form class="add-prop" method="POST" action="add_prop.php">
		<br>
		<center>
	  <input type="text" placeholder="Titulo" name="titulo" required=""/>
	  <br>
	 
	<textarea placeholder="Insira algum texto..." name="texto" required=""></textarea>
	  <br><br>
	 
	 <div id="short_text"> Data de expiração:</div><br>
	  <input placeholder="AAAA-MM-DD" type="date"  name="expiracao" required="">
	  <br>
	   <select name='vinculo' required>
			<option value="">Vínculo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
	</select>
	  <br>
	  <select id="curso" name="curso" required>
				<option value="">Curso</option>
				<option value="IG">Informática de Gestão</option>
				<option value="MEC">Manutenção Industrial/Mecatrónica</option>
				<option value="EAC">Eletrónica, Automação e Comando</option>
				<option value="GPSI">Gestão e Programação de Sistemas Informáticos</option>
				<option value="TUR">Turismo</option>
				<option value="GEST">Gestão</option>
	</select>
	  <br>
	  					
	<input type="submit" value="POSTAR" name="postar">
	  <br>				
		<center>
							
		</form>
		
		
		
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

