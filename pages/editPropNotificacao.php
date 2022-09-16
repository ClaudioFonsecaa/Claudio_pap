<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		<title>Editar Proposta</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		
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

.red {
    background-color: red;
}

.green {
    background-color: green;
}

</style>

<script>
$("#color_me").change(function(){
    var color = $("option:selected", this).attr("class");
    $("#color_me").attr("class", color);
});
</script>



		
		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
	
		 <div class="pagina">
		 
		 <div class="caixa_branca">
		
		 <a href="notificacao.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
		 
		 
		<h1 align='center'> Editar Proposta </h1>
		
		
		<form name="editarProp" action="editarPropostaNotificacao.php?id=<?php echo($_GET['id']) ?>" method="POST">
		
		<?php
		
		
		$id = $_GET['id'];
		
		
		$error = "Unable to connect.";
		$connection = mysqli_connect("127.0.0.1", "root", "rootroot") or die ($error);
		mysqli_select_db($connection,"pap") or die ($error);

		
		$query = mysqli_query($connection, "SELECT * FROM propostas WHERE idpropostas = '$id' ") or die("Error: ".mysqli_error($connection));
		
		
		$ob = mysqli_fetch_object($query);
		
		//<textarea name='texto' value='$ob->texto'></textarea>
		echo "
		
		<br>
		<center>
	  <input type='text' name='titulo' value='$ob->titulo'/>
	  <br>
	 
	 <textarea placeholder='Insira algum texto...' name='texto' required> $ob->texto </textarea>
	
	  <br><br>
	 
	 <div id='short_text'> Data de expiração:</div><br>
	  <input type='date'  name='expiracao' value='$ob->expiracao'>
	  <br>
	 "; 
		echo "<select class='' name='vinculo' >";
		switch ('vinculo'){
				case $ob->vinculo == 'Estágio Curricular'; 
				echo"
				<option value='Estágio Curricular'>Estágio Curricular</option>
				<option value='Estágio Profissional'>Estágio Profissional</option>
				<option value='Prestação de Serviços'>Prestação de Serviços</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				";break;
				case $ob->vinculo == 'Estágio Profissional'; 
				echo"
				<option value='Estágio Profissional'>Estágio Profissional</option>
				<option value='Prestação de Serviços'>Prestação de Serviços</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				<option value='Estágio Curricular'>Estágio Curricular</option>
				
				";break;
				case $ob->vinculo == 'Prestação de Serviços'; 
				echo"
				<option value='Prestação de Serviços'>Prestação de Serviços</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				<option value='Estágio Curricular'>Estágio Curricular</option>
				<option value='Estágio Profissional'>Estágio Profissional</option>
				
				";break;
				case $ob->vinculo == 'Contrato a Termo'; 
				echo"
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				<option value='Estágio Curricular'>Estágio Curricular</option>
				<option value='Estágio Profissional'>Estágio Profissional</option>
				<option value='Prestação de Serviços'>Prestação de Serviços</option>
				
				";break;
				case $ob->vinculo == 'Contrato Sem Termo'; 
				echo"
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				<option value='Estágio Curricular'>Estágio Curricular</option>
				<option value='Estágio Profissional'>Estágio Profissional</option>
				<option value='Prestação de Serviços'>Prestação de Serviços</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				
				";break;
				
				default: echo "
				<option selected disabled>Vínculo</option>
				<option value='Estágio Curricular'>Estágio Curricular</option>
				<option value='Estágio Profissional'>Estágio Profissional</option>
				<option value='Prestação de Serviços'>Prestação de Serviços</option>
				<option value='Contrato a Termo'>Contrato a Termo</option>
				<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
				";
				
		}
		echo "</select> <br>";
	  
		echo "
		<select id='color_me' class='' name='estado' >";
		
		switch('estado'){
		
		case $ob->estado == 'ativa'; echo"
			<option class='green' value='ativa' selected>Ativada</option>
			<option class='red' value='desativada'>Desativada</option>
			"; break;
		
		case $ob->estado == "desativada"; echo"
			<option class='red' value='desativada' selected>Desativada</option>
			<option class='green' value='ativa'>Ativada</option>
			"; break;
	
		
		} echo"</select>";
		
		
		echo "<select id='color_me' class='' name='curso' >";
		
		switch ('curso'){
				case $ob->curso == 'IG'; echo"
				
				<option value='IG'>Informática de Gestão</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				
				"; break;
				case $ob->curso == 'MEC'; echo"
				
				
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				
				"; break;
				
				case $ob->curso == 'EAC'; echo"
				
				
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				
			
				"; break;
				
				
				case $ob->curso == 'GPSI'; echo"
				
				
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				
				
				"; break;
				
				case $ob->curso == 'TUR'; echo"
				
				
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				
				"; break;
				
				case $ob->curso == 'GEST'; echo"
				
				<option value='GEST'>Gestão</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='TUR'>Turismo</option>
				
				"; break;
				
				default: echo "
				<option selected disabled>Selecione o curso</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				";
		
		
		}echo"</select>
	 
	  					
	<input type='submit' value='Guardar' name='guardar'>
	  <br>				
		<center>
							
		
		
		";
		
		?></form>
		
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

