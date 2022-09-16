<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<title>Empresas</title>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		
		
		 <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Tem a certeza que pretende apagar o utilizador ?');
}
</script>
		
		
		
		
		</head>
		<body>
			<?php include 'header.php';
			include "connect.php";
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 <h1 align="center">Empresas</h1>

		
		<?php
		
		$result = mysqli_query($connection,"select * from empresas, utilizadores where empresas.utilizadores_idutilizador=utilizadores.idutilizador and estado='ativo' order by idempresas asc")or die("Error: ".mysqli_error($connection));
		
		
		echo " <center>
<div class='tabela' style='width:80%;height:auto;'>
	
			
						
					<table border='1'>
					<tr>
					
					<td>Nome</td>
					<td>Email</td>
					<td>Morada</td>
					<td>Contacto</td>
					<td><img id='alter_icon' src='../img/edit.png'></td>
					<td><img id='alter_icon' src='../img/delete.png'></td>

					</tr>";

					while($dado = mysqli_fetch_array($result))
					{
 
					echo "<tr >";
					
					echo "<td>" . $dado['nome_utilizador'] . "</td>";
					echo "<td>" . $dado['email_empresa'] . "</td>";
					echo "<td>" . $dado['morada_empresa'] . "</td>";
					echo "<td>" . $dado['contacto_empresa'] . "</td>";
					echo "<td> <a href='editarE.php?id=".$dado['utilizadores_idutilizador']."' style='text-decoration:none'>Editar</a></td>";
					echo "<td> <a href='apagarEmp.php?id=".$dado['utilizadores_idutilizador']."' style='text-decoration:none' onclick='return checkDelete()'>Apagar</a></td>";
					
					echo "</tr>";
					}
					echo "</table></div>";
				
		?>
		
		
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

