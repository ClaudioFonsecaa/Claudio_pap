<!DOCTYPE html>
<meta charset="UTF-8">

<?php

	$error = "Unable to connect.";
	$connection = mysqli_connect("127.0.0.1", "root", "rootroot") or die ($error);
	mysqli_select_db($connection,"pap") or die ($error);

	$query = "select * from estatistica where tipo = 3";
	$result = mysqli_query($connection, $query) or die("Error: ".mysqli_error($connection));
	$dado = mysqli_fetch_array($result);
	
	
	$EMP = $dado['val1'];
	$DIP = $dado['val2'];
	$OUTRO = $dado['val3'];
	

?>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
			  google.charts.load('current', {'packages':['corechart']});
			  google.charts.setOnLoadCallback(drawChart);
			

	var one_stat3 = "% de Alunos Empregados (Taxa de Empregabilidade) ";
	var two_stat3 = "% de Alunos Diplomados";
	var three_stat3 = "Outro";


	
	var primeira_stat3 = <?php echo $EMP;?>;
	var segunda_stat3 = <?php echo $DIP;?>;
	var tereceira_stat3 = <?php echo $OUTRO;?>;
		
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          [one_stat3,    primeira_stat3],
          [two_stat3,      segunda_stat3],
		   [three_stat3,      tereceira_stat3]
        ]);

        var options = {
          title: 'Taxa de Empregabilidade (%)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
	  
	  </script>