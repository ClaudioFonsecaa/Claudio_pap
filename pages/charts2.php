<?php
session_start();

		$CON = $_POST['CON'];
		$NCON = $_POST['NCON'];

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
			

			var one_stat2= "% de Alunos que Concluíu (Taxa de Conclusão)";
	var two_stat2 = "% de Alunos Não Concluíu";

	
	var primeira_stat2 = <?php echo $CON;?>;
	var segunda_stat2 = <?php echo $NCON;?>;
		
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          [one_stat2,    primeira_stat2],
          [two_stat2,      segunda_stat2]
        ]);

        var options = {
          title: 'Taxa de Conclusão'
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
			
			<a href="add_stat_2.php?CON=<?php echo $CON;?>&NCON=<?php echo $NCON;?>">
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

