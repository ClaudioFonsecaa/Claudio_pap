<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<title>Notificações</title>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		
		<style>
		
			h2 {
			color:green;
			}
		
		</style>
		
		<script language="JavaScript" type="text/javascript">
		function checkDelete(){
				return confirm('Tem a certeza que pretende apagar a proposta ?');
		}
		
		function checkDelete2(){
				return confirm('Tem a certeza que pretende eliminar a entrada da empresa definitivamente ?');
		}
		function checkDelete3(){
				return confirm('Tem a certeza que pretende eliminar a notificação definitivamente ?');
		}
		function checkDelete4(){
				return confirm('Tem a certeza que pretende eliminar o inquérito de satisfação definitivamente ?');
		}
</script>
		
		
		
		
		</head>
		<body>
		
		<?php include 'header.php';
			
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 <h1 align="center">Centro de notificações</h1>
		 
		 <h2 align="left" >Minhas Propostas</h2>
		 <img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		 
		<?php
		
		$result2 = mysqli_query($connection,"select * from propostas where utilizadores_idutilizador='".$_SESSION["userID"]."' ") or die("Error: ".mysqli_error($connection));
		
		echo " <center>
<div class='tabela'>
	
			
						
					<table border='1 align='left''>
					<tr>
					<td>Data de Postagem</td>
					<td>Título</td>
					<td>Texto</td>
					<td>Vinculo</td>
					<td>Data de expiração</td>
					<td>Curso</td>
					<td>Estado</td>
					<td><img id='alter_icon' src='../img/editProp.png'></td>
					<td><img id='alter_icon' src='../img/delete.png'></td>
					</tr>
					";
					
					while($dado2 = mysqli_fetch_array($result2)){
						
						echo "<tr >";
						
	
						echo "<td>" . $dado2['data'] . "</td>";
						echo "<td>" . $dado2['titulo'] . "</td>";
						echo "<td>" . $dado2['texto'] . "</td>";
						echo "<td>" . $dado2['vinculo'] . "</td>";
						echo "<td>" . $dado2['expiracao'] . "</td>";
						echo "<td>" . $dado2['curso'] . "</td>";
						
						if($dado2['estado']=='ativa'){
							echo "<td bgcolor='green' > Ativa </td>";
						}elseif($dado2['estado']=='desativada'){
							echo "<td bgcolor='red' > Desativada </td>";
						}
						
						echo "<td> <a href='editPropNotificacao.php?id=".$dado2['idpropostas']."' style='text-decoration:none'>Editar</a> </td>";
						
						if($_SESSION['userLevel']=='2'){
						echo "<td> <a href='escolherAluno.php?id=".$dado2['idpropostas']."' style='text-decoration:none' onclick='return checkDelete()'>Apagar</a></td>";
						
						}else{
							
						echo "<td> <a href='apagarPropostaN2.php?id=".$dado2['idpropostas']."' style='text-decoration:none' onclick='return checkDelete()'>Apagar</a></td>";	
						
						}
					
						echo "</tr >";	
						
						
						
					}
					
					
					echo "
					</table>
					</div>
		 ";
		 ?>
		 
		 <?php
		 //$result5 = mysqli_query($connection,"select * from notifications where utilizadores_idutilizador=".$_SESSION['userID']." ") or die("Error: ".mysqli_error($connection));
		// $result6 = mysql_query ($connection, "select * from satisfacao where utilizadores_idutilizador=".$_SESSION['userID']." ");	
		
		$query_final = "SELECT * FROM satisfacao, utilizadores where utilizadores.idutilizador=".$_SESSION['userID']." and satisfacao.utilizadores_idutilizador=utilizadores.idutilizador";
		
		$result5 = mysqli_query($connection, $query_final) or die("Error: ".mysqli_error($connection));
		
		
			if($_SESSION['userLevel']=='2'){
		 
		  echo "
		 <h2 align='left' >Satisfação dos empregadores</h2>
		 <img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		 ";
		 
		 echo " <center>
					<div class='tabela'>
	
					<table border='1 align='left''>
					<tr>
					<td>Nome</td>
					<td>Avaliar</td>
					</tr>
			";		
			
			while($dado5 = mysqli_fetch_array($result5)){
				if($dado5['preenchido'] == 'Não'){
			echo"<tr>";
			echo "<td>" . $dado5['nome_satisf'] . "</td>";
			echo "<td> <a href='satisfacao.php?id=".$dado5['nome_satisf']."' style='text-decoration:none'>Preencher Inquérito</a></td>";
			echo "	</tr> ";
			
				}
			
			}
		 
		 echo "</table>";
		echo "</div>";

			}
		 ?>
		 
		 
		<?php 
		
		
		$result = mysqli_query($connection,"select * from utilizadores where estado='desativo' and  nivel=2") or die("Error: ".mysqli_error($connection));
		
		if($_SESSION['userLevel']=='3'){
		 echo "
		 <h2 align='left' >Novas Empresas</h2>
		 <img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		 ";
		 
		 
		 echo " <center>
					<div class='tabela'>
	
					<table border='1 align='left''>
					<tr>
					<td>Nome</td>
					<td><img id='alter_icon' src='../img/certo.png'></td>
					<td><img id='alter_icon' src='../img/cruz.png'></td>
					</tr>
					
					";
					
					while($dado = mysqli_fetch_array($result)){
						
						echo "<tr >";
						
	
						echo "<td>" . $dado['nome_utilizador'] . "</td>";
						echo "<td> <a href='aceitarEmpresa.php?id=".$dado['idutilizador']."' style='text-decoration:none'>Aceitar</a> </td>";
						echo "<td>  <a href='eliminarEmpresa.php?id=".$dado['idutilizador']."' style='text-decoration:none' onclick='return checkDelete2()'>Eliminar</a></td>";
					
						
						echo "</tr >";	
					}
					
					
					echo"
					</table>
					
					</div>
		 ";
		 
		 
		 $result3 = mysqli_query($connection,"select * from notifications") or die("Error: ".mysqli_error($connection));
		 
		  echo "
		 <h2 align='left' >Notificações</h2>
		 <img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		 ";
		 
		 
		  echo " <center>
					<div class='tabela'>
	
					<table border='1 align='left''>
					<tr>
					<td>Data</td>
					<td>Notificação</td>
					<td><img id='alter_icon' src='../img/cruz.png'></td>
					</tr>
		
			";
					while($dado3 = mysqli_fetch_array($result3)){
						
						echo "<tr >";
						
	
						echo "<td>" . $dado3['data'] . "</td>";
						echo "<td>" . $dado3['texto'] . "</td>";
						echo "<td>  <a href='eliminarNotificacao.php?id=".$dado3['idnotifications']."' style='text-decoration:none' onclick='return checkDelete3()'>Eliminar</a></td>";
					
						
						echo "</tr >";	
					}
					
			echo"
					</table>
					
					</div>
		 ";	
		 
		 
		 echo "
		 <h2 align='left' >Inquéritos de satisfação do empregador</h2>
		 <img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
		 ";
		 
		 
		 $result4 = mysqli_query($connection,"select * from satisfacao, utilizadores where satisfacao.utilizadores_idutilizador=utilizadores.idutilizador") or die("Error: ".mysqli_error($connection));
		 
		 echo " <center>
					<div class='tabela'>
	
					<table border='1 align='left''>
					<tr>
					<td>Aluno</td>
					<td>Empresa</td>
					<td>Competências técnicas inerentes ao posto de trabalho</td>
					<td>Planeamento e organização</td>
					<td>Responsabilidade e autonomia</td>
					<td>Comunicação e relações interpessoais</td>
					<td>Trabalho em equipa</td>
					<td>Totais</td>
					<td><img id='alter_icon' src='../img/cruz.png'></td>
					</tr>
		
			";
					while($dado4 = mysqli_fetch_array($result4)){
						
						if($dado4['preenchido']=='Sim'){
						
						echo "<tr >";
						
						echo "<td>" . $dado4['nome_satisf'] . "</td>";
						echo "<td>" . $dado4['nome_utilizador'] . "</td>";
						echo "<td>" . $dado4['comp_tecnicas'] . "</td>";
						echo "<td>" . $dado4['planeamento_organizacao'] . "</td>";
						echo "<td>" . $dado4['responsabilidade_autonomia'] . "</td>";
						echo "<td>" . $dado4['comunicacao_relacoes_interpessoais'] . "</td>";
						echo "<td>" . $dado4['trabalho_equipa'] . "</td>";
						echo "<td>" . $dado4['totais'] . "</td>";
						echo "<td>  <a href='eliminarSatisfacao.php?id=".$dado4['idsatisfacao']."' style='text-decoration:none' onclick='return checkDelete4()'>Eliminar</a></td>";
					
						
						echo "</tr >";	
						}
						
						}
					
			echo"
					</table>
					
					</div>
		 ";	
		 
		 
		 

		 }
		 ?>
 
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

