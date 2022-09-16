<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		<title>Editar alunos</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
		
		
		 <div class="pagina">
		 
		 <div class="form">
		 
		 
		 
		
		 <a href="alunos.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
		 
		 <form name="editar" action="editarAligacao.php?id=<?php echo($_GET['id']) ?>" method="POST">
		 
		 <?php 
		
		
		$id = $_GET['id'];
		
		
		$error = "Unable to connect.";
		$connection = mysqli_connect("127.0.0.1", "root", "rootroot") or die ($error);
		mysqli_select_db($connection,"pap") or die ($error);

		
		
		$query = mysqli_query($connection, "SELECT * FROM alunos, utilizadores WHERE idaluno = '$id' and alunos.utilizadores_idutilizador=utilizadores.idutilizador ") or die("Error: ".mysqli_error($connection));
		
		
		$ob = mysqli_fetch_object($query);
		
		
		if($ob->ano=='1'){
			$ano='2015/2016';
			
		}else if ($ob->ano==2){
			$ano='2016/2017';
			
		}
		
		
		echo "
		
		<h1>Editar</h1>
		
		<br><br>Nome:<br>
		<input type='text' name='nome' class='formulario' required  value='$ob->nome_proprio'>
		<br>
		
		Vínculo:<br>
		 <select name='vinculo'>";
		 
		switch('vinculo'){
		
		case $ob->vinculo == 'Estágio Curricular'; echo"
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
		"; break;
		
		case $ob->vinculo == 'Estágio Profissional'; echo"
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
		"; break;
		
		case $ob->vinculo == 'Prestação de Serviços'; echo"
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
		"; break;
		
		case $ob->vinculo == 'Contrato a Termo'; echo"
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
		"; break;
		
		case $ob->vinculo == 'Contrato Sem Termo'; echo"
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
		"; break;
		
		default: echo "
			<option selected disabled >Selecione o vínculo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
		";
		}
		
		echo "</select>
		<br>
		
		
		Email:<br>
		<input type='text' name='email' class='formulario' required  pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' value='$ob->email_aluno'>
		<br>
		
		
		Género:<br>
		<select name='genero' required=''>";
		
		switch('genero'){
		
		case $ob->genero == 'Masc'; echo"
			<option value='Masc'>Masculino</option>
			<option value='Femin'>Feminino</option>
			"; break;
		
		case $ob->genero == "Femin"; echo"
			<option value='Femin'>Feminino</option>
			<option value='Masc'>Masculino</option>
			"; break;
			
		default: echo "
				<option selected disabled>Selecione o genero</option>
				<option value='Masc'>Masculino</option>
				<option value='Femin'>Feminino</option>
		";
		
		} echo"</select>
		<br>
							
		Data de Nascimento:<br>
		<input type='date' name='data' class='formulario'   value=$ob->data>
		
		<br>
						
		Morada:<br>
		<input type='text' name='morada' class='formulario'   value='$ob->morada_aluno'>
		<br>
		
		Contacto:<br>
		<input type='text' name='contacto' class='formulario'  type='number' onkeypress='return isNumberKey(event)' value=$ob->contacto_aluno>
		<br>
							
		Ano:<br>
		<select name='ano' >";
		
		switch('ano'){
		
		case $ob->ano == '1'; echo "
				<option value='1'>2015/2016</option>
				<option value='2'>2016/2017</option>
		
		"; break;
		
		case $ob->ano == '2'; echo "
				<option value='2'>2016/2017</option>
				<option value='1'>2015/2016</option>
				
		
		"; break;
		
		default: echo "
				<option selected disabled>Selecione o ano letivo</option>
				<option value='1'>2016/2017</option>
				<option value='1'>2015/2016</option>
		";

		} echo "</select>
		<br>
		
		
		Curso:<br> <select id='curso' name='curso' required=''>";
		
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
				<option value=''>Curso</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				";
				
		} echo "</select>
		
		
		
		Prossegiu estudos:<br>
		
		<select id='estudos' name='estudos' required=''>";
		
		switch('estudos'){
			case $ob->estudos == 'Sim'; echo"
									<option value='Sim'>Sim</option>
									<option value='Não'>Não</option>
			"; break;
			
			case $ob->estudos == 'Não'; echo"
									<option value='Não'>Não</option>
									<option value='Sim'>Sim</option>
			"; break;		
									
									
		} echo "</select>
		
		<br>
							
		Empregado:<br>
		
		<select id='empregado' name='empregado' required=''>";
		
		switch('estudos'){
			case $ob->estudos == 'Sim'; echo"
									<option value='Sim'>Sim</option>
									<option value='Não'>Não</option>
			"; break;
			
			case $ob->estudos == 'Não'; echo"
									<option value='Não'>Não</option>
									<option value='Sim'>Sim</option>
			"; break;
			
		} echo "</select>
		
		<br>

						
							
		<center><br><button type='submit' class='botao' name='button' >Guardar</button></center>
		
		
		";
		
		
		
		
		?></form>
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

