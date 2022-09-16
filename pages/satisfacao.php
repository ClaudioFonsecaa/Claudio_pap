

<?php
session_start();

$id = $_GET['id'];

if (isset($_SESSION["user"]) && null != ($_SESSION["user"])){
?>
	<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		<title>Inquérito</title>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		
		
		
				<style>

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


</style>
		
		
		
		
		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 <div align='center'>
		 
		 
			 <form method="POST" action="satisfacao_sub.php?id=<?php echo $id?>">
		
				<h1 align='center'>Satisfação dos empregadores<h1>
				
				<br>
		
				<h5 align='center'>
		
				<h3 align='center' >Competências técnicas inerentes ao posto de trabalho</h3>
				
				<input type="radio" name="comp_tec" value="Insatisfeito" required> Insatisfeito 
				<input type="radio" name="comp_tec" value="Pouco satisfeito" required>Pouco satisfeito</td>
				<input type="radio" name="comp_tec" value="Satisfeito" required>Satisfeito
			    <input type="radio" name="comp_tec" value="Muito satisfeito" required>Muito satisfeito
				
				<br>
				
				<h3 align='center'>Planeamento e organização</h3>
				
				<input type="radio" name="plan_orga" value="Insatisfeito" required>Insatisfeito 
				<input type="radio" name="plan_orga" value="Pouco satisfeito">Pouco satisfeito</td>
				<input type="radio" name="plan_orga" value="Satisfeito">Satisfeito
			    <input type="radio" name="plan_orga" value="Muito satisfeito">Muito satisfeito
				
				<h3 align='center'>Responsabilidade e autonomia</h3>
				
				<input type="radio" name="respon_auto" value="Insatisfeito" required>Insatisfeito 
				<input type="radio" name="respon_auto" value="Pouco satisfeito">Pouco satisfeito</td>
				<input type="radio" name="respon_auto" value="Satisfeito">Satisfeito
			    <input type="radio" name="respon_auto" value="Muito satisfeito">Muito satisfeito
				
				<h3 align='center'>Comunicação e relações interpessoais</h3> 
				
				<input type="radio" name="comunic_rela_inter" value="Insatisfeito" required>Insatisfeito 
				<input type="radio" name="comunic_rela_inter" value="Pouco satisfeito">Pouco satisfeito</td>
				<input type="radio" name="comunic_rela_inter" value="Satisfeito">Satisfeito
			    <input type="radio" name="comunic_rela_inter" value="Muito satisfeito">Muito satisfeito
				
				<h3 align='center'>Trabalho em equipa</h3>
				
				<input type="radio" name="trab_equipa" value="Insatisfeito" required>Insatisfeito 
				<input type="radio" name="trab_equipa" value="Pouco satisfeito">Pouco satisfeito</td>
				<input type="radio" name="trab_equipa" value="Satisfeito">Satisfeito
			    <input type="radio" name="trab_equipa" value="Muito satisfeito">Muito satisfeito
				
				
				<h3 align='center'>Totais</h3>

				<input type="radio" name="totais" value="Insatisfeito" required>Insatisfeito 
				<input type="radio" name="totais" value="Pouco satisfeito">Pouco satisfeito</td>
				<input type="radio" name="totais" value="Satisfeito">Satisfeito
			    <input type="radio" name="totais" value="Muito satisfeito">Muito satisfeito
	
				</h5>
				</div>	
				<br><br>
				
				<input type="submit" value="SUBMETER" id="submeter" name="submeter"><br>
			
			 </form>
			 
			  
		 
		 </div>
		 
		 </div>

		<?php include 'footer.php';?>
		
		</body>
		
	</html>
	
<?php

	}else{
	echo "<script>alert('Inicie Sessão primeiro!');top.location.href='../index.html';</script>";}
?>

