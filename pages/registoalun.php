<?php
session_start();
$_SESSION["nivel"]=1;
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Alunos</title>
      <link rel="stylesheet" href="../css/style.css">
	  
	  
</head>

<body>

	<div id="titulo">
	<h1>Serviço de Psicologia e Orientação</h1>
	<h1>(SPO)</h1>
	</div>
	
	

	<div class="login-page">
	<div class="form">
	
	
	
	<form class="login-form" method="POST" action="../pages/registo.php">
	
      <input type="text" placeholder="Nome de Utilizador" name="login" pattern="[A-Za-z]{5,}" title="Deve conter no mínimo 5 letras, sem caracters especiais!" required />
	  <img id="icon" src="../img/usericon.png" alt="">
	  <input type="text" placeholder="Nome Próprio" name="nproprio" required=""/>
	  
		  <select id="curso" name="curso" required>
				<option value="">Curso</option>
				<option value="IG">Informática de Gestão</option>
				<option value="MEC">Manutenção Industrial/Mecatrónica</option>
				<option value="EAC">Eletrónica, Automação e Comando</option>
				<option value="GPSI">Gestão e Programação de Sistemas Informáticos</option>
				<option value="TUR">Turismo</option>
				<option value="GEST">Gestão</option>
		  </select>
	  
      <input type="password" placeholder="Password" name="senha" id="password" required=""/>
	  <img id="icon" src="../img/passicon.png" alt="">
	  <input type="password" placeholder="Confirmação de Password" name="confsenha" id="confirm_password" required=""/>
      <input type="text" placeholder="Email  ex: email@email.com" name="email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/>
	  <img id="icon" src="../img/mailicon.png" alt="">
	  
	<select id="empregado" name="empregado" required="">
				<option value="">Está empregado?</option>
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
	</select>
	
	<select id="estudos" name="estudos" required="">
				<option value="">Prossegiu estudos?</option>
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
	</select>
	  
	  
      <input type="submit" value="REGISTAR" id="botoes" name="registar"><br>
      <p class="message">Estás registado? <a href='../index.html'>Entrar</a></p>
	  <p class="message"><a href='registoemp.php'>É uma empresa ?</a></p>
    </form>
	
	
	<script>
var password = document.getElementById("password") , confirm_password = document.getElementById("confirm_password");
function validatePassword(){
if(password.value != confirm_password.value) {
 confirm_password.setCustomValidity("Senhas diferentes!");
} else {
 confirm_password.setCustomValidity('');
}
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

</div>
</div>
	  
	<div id="logo_sico"><img id="sico_logo" src="../img/logo_sico.png" width="250" height="100" alt=""></div>
	<?php include 'footer.php';?>
		
</body>
</html>
