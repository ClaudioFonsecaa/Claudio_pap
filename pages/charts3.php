<?php
session_start();

	$OUTRO = $_POST['OUTRO'];
	$EMP = $_POST['EMP'];
	$DIP = $_POST['DIP'];
	

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
			

			var one = "% de Alunos Empregados (Taxa de Empregabilidade) ";
	var two = "% de Alunos Diplomados";
	var three = "Outro";


	
	var primeira = <?php echo $EMP;?>;
	var segunda = <?php echo $DIP;?>;
	var tereceira = <?php echo $OUTRO;?>;
		
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          [one,    primeira],
          [two,      segunda],
		   [three,      tereceira]
        ]);

        var options = {
          title: 'Taxa de Empregabilidade (%)'
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
		 
			<div align="center" >
		 	<h1>Publicar</h1>
			<a href="add_stat_3.php?EMP=<?php echo $EMP;?>&OUTRO=<?php echo $OUTRO;?>&DIP=<?php echo $DIP;?> ">
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

