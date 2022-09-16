<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<title>Alunos</title>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		  <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Tem a certeza que pretende apagar o utilizador ?');
}
</script>
		
		
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		
		<style>
		
		#tt2{
			text-align: center;
			color: #006400;
			font-size: 35px;
			font-weight: bold;
			
		}
		
		</style>
		
		</head>
		<body>
			<?php include 'header.php';
			include "connect.php";
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 <?php if($_SESSION['userLevel']==3){
			 echo "
		 <a href='add_alunos_admin.php'> 
			<img id='add_icon' src='../img/add_user.png' alt='add_icon'>
		</a>
		";
		
		}
		?>
		 
		 <br><br><br><br>
		 <h1 align="center">Alunos</h1>

		 <div id="tt2">Ordenação</div>
		
		
		<br>
		<div align="center">
		<button onclick="location.href='alunos.php'" class="botao"  type="button"  name="button">Nome</button>
		<button onclick="location.href='alunosAnoLetivo.php'" class="botao"  type="button"  name="button">Ano Letivo</button>	
		<button onclick="location.href='alunosVinculo.php'" class="botao"  type="button"  name="button">Vinculo</button>
		<button onclick="location.href='alunosEmpregabilidade.php'" class="botao"  type="button"  name="button">Empregabilidade</button>	
		<button onclick="location.href='alunosEstudos.php'" class="botao"  type="button"  name="button">Estudos</button>
		<button onclick="location.href='alunosRegistado.php'" class="botao"  type="button"  name="button">Registado</button>					
		</div>	
		
		<?php
		
		
		//$result = mysqli_query($connection,"select * from alunos order by idAluno asc ");
		
		$result = mysqli_query($connection,"select * from alunos, utilizadores where alunos.utilizadores_idutilizador=utilizadores.idutilizador order by vinculo asc") or die("Error: ".mysqli_error($connection));
	//	$result2 = mysqli_query($connection,"select * from utilizadores where nivel=1 order by idUtilizador") or die("Error2: ".mysqli_error($connection));
		
		echo " <center>
<div class='tabela'>
	
			
						
					<table border='1 align='left''>
					<tr>
					
					<td>Registado</td>";
					
					if($_SESSION['userLevel']==3){
					echo "<td>Nome de Utilizador</td>";
					}
					
					echo "
					<td>Nome Próprio</td>
					<td>Vinculo</td>
					<td>Email</td>
					<td>Género</td>
					<td>Data de Nascimento</td>
					<td>Morada</td>
					<td>Contacto</td>
					<td>Ficheiros</td>
					<td>Ano Letivo</td>
					<td>Curso</td>
					<td>Prossegiu estudos</td>
					<td>Empregado</td>
				";
				if($_SESSION['userLevel']==3){
				echo "
					<td><img id='alter_icon' src='../img/edit.png'></td>
					<td><img id='alter_icon' src='../img/delete.png'></td>
					</tr>";
				}
					
					while($dado = mysqli_fetch_array($result))
					{
 
					if($dado['ano']==1){
						$ano='2015/2016';
					}else if ($dado['ano']==2){
						$ano='2016/2017';
					}else if($dado['ano']==NULL){
						$ano='';
					}
 
 
					echo "<tr >";
					
					if($dado['registado']=='Sim'){
					echo "<td bgcolor='green' >" . $dado['registado'] . "</td>";
					}else{
					echo "<td bgcolor='red' >" . $dado['registado'] . "</td>";	
					}
					
					if($_SESSION['userLevel']==3){
						if($dado['nome_utilizador']=='admin'){
						echo "<td> Não possui </td>";
						}else{
						echo "<td>" . $dado['nome_utilizador'] . "</td>";	
						}
					}
					
					echo "<td>" . $dado['nome_proprio'] . "</td>";
					
					if($dado['registado'] == 'Não'){
					echo "<td> Não possui </td>";
					}else{
					echo "<td>" . $dado['vinculo'] . "</td>";	
					}
					
					echo "<td>" . $dado['email_aluno'] . "</td>";
					echo "<td>" . $dado['genero'] . "</td>";
					echo "<td>" . $dado['data'] . "</td>";
					echo "<td>" . $dado['morada_aluno'] . "</td>";
					echo "<td>" . $dado['contacto_aluno'] . "</td>";
					echo "<td> <a href='ficheiro.php?id=".$dado['utilizadores_idutilizador']."&nome=".$dado['nome_proprio']."' style='text-decoration:none'>Ficheiro</a></td>";
					echo "<td>" . $ano . "</td>";
					echo "<td>" . $dado['curso'] . "</td>";
					echo "<td>" . $dado['estudos'] . "</td>";
					echo "<td>" . $dado['empregado'] . "</td>";
					
					if($_SESSION['userLevel']==3){
						echo "<td> <a href='editarA.php?id=".$dado['idaluno']."' style='text-decoration:none'>Editar</a></td>";
						
						if($dado['registado'] == 'Não'){
						echo "<td> <a href='apagarAlunos2.php?id=".$dado['idaluno']."' style='text-decoration:none' onclick='return checkDelete()'>Apagar</a></td>";	
						}else{
						echo "<td> <a href='apagarAlunos.php?id=".$dado['utilizadores_idutilizador']."' style='text-decoration:none' onclick='return checkDelete()'>Apagar</a></td>";	
						}
					}
					
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

