<?php
session_start();

	$IG = $_POST['IG'];
	$MEC = $_POST['MEC'];
	$EAC = $_POST['EAC'];
	$GPSI = $_POST['GPSI'];
	$TUR = $_POST['TUR'];
	$GEST = $_POST['GEST'];


if (isset($_SESSION["user"]) && null != ($_SESSION["user"])){
?>
	<!DOCTYPE html>
	<html>
		<head>
		
			<link rel="shortcut icon" href="../img/favicon.ico" >
			<title>Estatísticas</title>
			<meta charset="UTF-8">
			
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
			  google.charts.load('current', {'packages':['corechart']});
			  google.charts.setOnLoadCallback(drawChart);
			

			var one = "Informática de Gestão";
			var two = "Manutenção Industrial / Mecatrónica";
			var three = "Eletrónica, Automação e comando";
			var four = "Gestão e programação de sistemas informáticos";
			var fixe = "Turismo";
			var six = "Gestão";
			
			var primeira = <?php echo $IG;?>;
			var segunda = <?php echo $MEC;?>;
			var tereceira = <?php echo $EAC;?>;
			var quarta = <?php echo $GPSI;?>;
			var quinta = <?php echo $TUR;?>;
			var sexta = <?php echo $GEST;?>;
				
			  function drawChart() {

				var data = google.visualization.arrayToDataTable([
				  ['Task', 'Hours per Day'],
				  [one,    primeira],
				  [two,      segunda],
				  [three,  tereceira],
				  [four, quarta],
				  [fixe, quinta],
				  [six,    sexta]
				]);

				var options = {
				  title: 'Nº de Alunos empregados nas várias áreas'
				};

				var chart = new google.visualization.PieChart(document.getElementById('piechart'));

				chart.draw(data, options);
			  }
			</script>
	
		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 <a href="criar_stat.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
		
		<br><br><br><br>
		 
			<div align="center">
		 	<h1>Publicar</h1>
			
			<!--$url = "http://localhost/main.php?email=$email_address&event_id=$event_id";-->
			
			<a href="add_stat_1.php?IG=<?php echo $IG;?>&MEC=<?php echo $MEC;?>&EAC=<?php echo $EAC;?>&GPSI=<?php echo $GPSI;?>&TUR=<?php echo $TUR;?>&GEST=<?php echo $GEST;?>">
			<img src="../img/eye.png" alt="publicar">
			</a>
			
			</div>
		 
			<div id="piechart" style="width: 900px; height: 500px;"></div>
			
		 
		 </div>
		 
		 </div>
		

		
		
		</div>
		<?php include 'footer.php';?>
		</div>
		
		</body>
		
	</html>
	
<?php

	}else{echo "<script>alert('Inicie Sessão primeiro!');top.location.href='../index.html';</script>";}
?>

