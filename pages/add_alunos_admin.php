<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{

?>
	<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		<title>Adicionar aluno</title>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		

		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
		
		
		<div class="pagina">
		
		 <div class="form">
		 
		 <a href="alunos.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
		 
		 <h1>Registar</h1>
		 
		 <form action='add_alunos_ligacao.php' method='post' enctype='multipart/form-data'>
	  
	  <input type="text" placeholder="Nome" name="nome"  required=""/>
	  <img id="icon" src="../img/usericon.png" alt="">
	  
	  <select name='genero' required>
				<option selected disabled value="">Género</option>
				<option value='Masc'>Masculino</option>
				<option value='Fem'>Feminino</option>
		</select>
	  
	  <select name='ano' required>
				<option selected disabled value="">Ano Letivo</option>
				<option value='1'>2015/2016</option>
				<option value='2'>2016/2017</option>
		</select>
	  
	  
		  <select id="curso" name="curso" required>
				<option selected disabled value="">Curso</option>
				<option value="IG">Informática de Gestão</option>
				<option value="MEC">Manutenção Industrial/Mecatrónica</option>
				<option value="EAC">Eletrónica, Automação e Comando</option>
				<option value="GPSI">Gestão e Programação de Sistemas Informáticos</option>
				<option value="TUR">Turismo</option>
				<option value="GEST">Gestão</option>
		  </select>
	  
       <input type="text" placeholder="Email  ex: email@email.com" name="email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/>
	  <img id="icon" src="../img/mailicon.png" alt="">
	  
	  <input type='text' placeholder='Morada' name='morada' id='morada' required=''/>
	  
	  <input type='date' name='nascimento' required/>
	  
	  <input type='text' placeholder='Contacto' required='' name='contacto' type='number' onkeypress='return isNumberKey(event)'/>
	  
	  
	<select id="empregado" name="empregado" required="">
				<option selected disabled>Está empregado?</option>
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
	</select>
	
	<select id="estudos" name="estudos" required="">
				<option selected disabled>Prossegiu estudos?</option>
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
	</select>
	  
	  <h4 align="center">Ficheiro PDF</h4>
	  <label for='upload-file'>
		<img id='add_img_icon' width='50' height='50' src='../img/add_file.png' alt='Profile Pic'>
		</label>
	<input type='file' name='file' id='upload-file' />
	
	<br><br>
	<input align="center" type='submit' id="botoes" name='registar' value='REGISTAR'/>
	
	</form>
	  
	
		 
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
		
		
		
		<?php include 'footer.php';?>
		
		
		</body>
		
	</html>
	
<?php

	}else{
	echo "<script>alert('Inicie Sessão primeiro!');top.location.href='../index.html';</script>";
	}
?>


