<!DOCTYPE html>
<meta charset="UTF-8">

<?php

	$error = "Unable to connect.";
	$connection = mysqli_connect("127.0.0.1", "root", "rootroot") or die ($error);
	mysqli_select_db($connection,"pap") or die ($error);

	$query = "select * from estatistica where tipo = 2";
	$result = mysqli_query($connection, $query) or die("Error: ".mysqli_error($connection));
	$dado = mysqli_fetch_array($result);
	
	
	$CON = $dado['val1'];
	$NCON = $dado['val2'];
	

?>

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