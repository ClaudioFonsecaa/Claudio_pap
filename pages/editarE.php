<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		<title>Editar empresas</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
		
		
		 <div class="pagina">
		 
		 <div class="form">
		 
		 
		 
		
		 <a href="empresas.php"> 
			<img id="add_icon" src="../img/back_arrow.png" alt="back_arrow">
		</a>
		 
		 <form name="editar" action="editarEligacao.php?id=<?php echo($_GET['id']) ?>" method="POST">
		 
		 <?php 
		
		
		$id = $_GET['id'];
		
		
		$error = "Unable to connect.";
		$connection = mysqli_connect("127.0.0.1", "root", "rootroot") or die ($error);
		mysqli_select_db($connection,"pap") or die ($error);

		
		
		$query = mysqli_query($connection, "SELECT * FROM empresas WHERE utilizadores_idutilizador = '$id' ") or die("Error: ".mysqli_error($connection));
		
		
		$ob = mysqli_fetch_object($query);
		
		
		
		echo "
		
		<h1>Editar</h1>
		
		<br><br>Email:<br>
		<input type='text' name='email' class='formulario'  pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' value='$ob->email_empresa'>
		<br>
		
		Morada:<br>
		<input type='text' name='morada' class='formulario' value='$ob->morada_empresa'>
		<br>
		
		
		Contacto:<br>
		<input type='text' name='contacto' class='formulario' type='number' onkeypress='return isNumberKey(event)' value='$ob->contacto_empresa'>
		<br>
		
		
		<center><br><button type='submit' class='botao' name='button' >Guardar</button></center>
		
		";
		
		?>
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

