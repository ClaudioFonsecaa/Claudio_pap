<!DOCTYPE html>
<meta charset="UTF-8">

<?php

	$error = "Unable to connect.";
	$connection = mysqli_connect("127.0.0.1", "root", "rootroot") or die ($error);
	mysqli_select_db($connection,"pap") or die ($error);

	$query = "select * from estatistica where tipo = 1";
	$result = mysqli_query($connection, $query) or die("Error: ".mysqli_error($connection));
	$dado = mysqli_fetch_array($result);
	
	$IG = $dado['val1'];
	$MEC = $dado['val2'];
	$EAC = $dado['val3'];
	$GPSI = $dado['val4'];
	$TUR = $dado['val5'];
	$GEST = $dado['val6'];


?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
			  google.charts.load('current', {'packages':['corechart']});
			  google.charts.setOnLoadCallback(drawChart);
			

			var one_stat1 = "Informática de Gestão";
			var two_stat1 = "Manutenção Industrial / Mecatrónica";
			var three_stat1 = "Eletrónica, Automação e comando";
			var four_stat1 = "Gestão e programação de sistemas informáticos";
			var five_stat1 = "Turismo";
			var six_stat1 = "Gestão";
			
			var primeira_stat1 = <?php echo $IG;?>;
			var segunda_stat1 = <?php echo $MEC;?>;
			var tereceira_stat1 = <?php echo $EAC;?>;
			var quarta_stat1 = <?php echo $GPSI;?>;
			var quinta_stat1 = <?php echo $TUR;?>;
			var sexta_stat1 = <?php echo $GEST;?>;
				
			  function drawChart() {

				var data = google.visualization.arrayToDataTable([
				  ['Task', 'Hours per Day'],
				  [one_stat1,    primeira_stat1],
				  [two_stat1,      segunda_stat1],
				  [three_stat1,  tereceira_stat1],
				  [four_stat1, quarta_stat1],
				  [five_stat1, quinta_stat1],
				  [six_stat1,    sexta_stat1]
				]);

				var options = {
				  title: 'Nº de Alunos empregados nas várias áreas'
				};

				var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

				chart.draw(data, options);
			  }
			</script>