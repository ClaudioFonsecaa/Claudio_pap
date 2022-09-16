<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Recuperar Password</title>
      <link rel="stylesheet" href="../css/style.css">
	  
	  <link rel="shortcut icon" href="../img/favicon.ico" >
</head>

<body>

		<div id="titulo">
	<h1>Serviço de Psicologia e Orientação</h1>
	<h1>(SPO)</h1>
	</div>


	<div class="login-page">
	<div class="form">
	
		
		
		<script language="javascript">var sa_email_id = '81527-e365e';var sa_sent_text = 'Obrigado por nos contactar.';</script>
        <script language="javascript" src="http://s1.smartaddon.com/sa_htmlform.js"></script>

                                
        <section>
            <script language="javascript"> var sa_email_id = '81527-e365e'; </script>
		
		<form class="login-form" method="POST" action="envio.php">
		
			<input type="text" placeholder="Nome de Utilizador" name="login" required=""/>
			<img id="icon" src="../img/usericon.png" alt="">
			<input type="text" placeholder="Email" name="email" pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required=""/>
			<img id="icon" src="../img/mailicon.png" alt="">
		
			<input type="submit" value="RECUPERAR" id="botoes" name="registar"><br>
			<p class="message">Está registado? <a href='../index.html'>Entrar</a></p>
		</form>
		
		
		</section>
		
	
	
	</div>
	</div>
	  
	<div id="logo_sico"><img id="sico_logo" src="../img/logo_sico.png" width="250" height="100" alt=""></div>
	<?php include 'footer.php';?>
		
</body>
</html>
