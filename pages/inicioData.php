<?php
session_start();

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
	
	if($_SESSION['userEstado']=='ativo'){
?>
	<!DOCTYPE html>
	<html>
		<head>
		<title>Início</title>
		<link rel="shortcut icon" href="../img/favicon.ico" >
		
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
		
		
		
		<style>

		.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #CC0000;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #009900;
}

input:focus + .slider {
  box-shadow: 0 0 1px #00ff80
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
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
		include "connect.php";?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
			<a href="adicionar_prop.php"> 
			<img id="add_icon" src="../img/add_icon.png" alt="add_icon">
			</a>
			
			<h1 align='right' >Propostas</h1>
			<div id="tt2">Ordenação</div>
		
		
		<br>
		<div align="center">
		<button onclick="location.href='inicio.php'" class="botao"  type="button"  name="button">Propostas</button>
		<button onclick="location.href='inicioCurso.php'" class="botao"  type="button"  name="button">Curso</button>
		<button onclick="location.href='inicioData.php'" class="botao"  type="button"  name="button">Data</button>
		<button onclick="location.href='inicioVinculo.php'" class="botao"  type="button"  name="button">Vínculo</button>
		</div>	
		
			
			
			<?php
	
				
		
				$result = mysqli_query($connection,"select * from propostas where estado='ativa' order by expiracao asc")
				or die("Error: ".mysqli_error($connection));
				//$dado = mysqli_fetch_array($result);
				

				
				//frame='box' rules='none'
				echo " <center>	
					<table name='proposta'  frame='box' rules='none' border='0' bordercolor='black' cellspacing='15' cellpadding='15'>
					";
				while($dado = mysqli_fetch_array($result))
					{
				
			//if($dado['estado'] =='ativa'){		
					echo "<tr >";
					
					echo "
			
					<td bgcolor='#E0E0E0'>
					". $dado['utilizador'] . "
					</td>
		
					
					";
					
					if($dado['curso']=='MEC'){
						
						echo "
			
					<td bgcolor='#E0E0E0'>
					<img  src='../img/MEC.png' >
					</td>
		
					
					";
					
					}elseif($dado['curso']=='IG'){
						
						echo "
			
					<td bgcolor='#E0E0E0'>
					<img  src='../img/IG.png' >
					</td>
		
					
					";
						
						
					}elseif($dado['curso']=='TUR'){
						
						echo "
			
					<td bgcolor='#E0E0E0'>
					<img  src='../img/TUR.png' >
					</td>
		
					
					";
						
					}elseif($dado['curso']=='EAC'){
						
						echo "
			
					<td bgcolor='#E0E0E0'>
					<img  src='../img/EAC.png' >
					</td>
		
					
					";
						
						
					}elseif($dado['curso']=='GEST'){
						
						
						echo "
			
					<td bgcolor='#E0E0E0'>
					<img  src='../img/GEST.png' >
					</td>
		
					
					";
						
						
					}elseif($dado['curso']=='GPSI'){
						
						echo "
			
					<td bgcolor='#E0E0E0'>
					<img  src='../img/GPSI.png' >
					</td>
		
					
					";
					}
					
					
					
					if($dado['utilizadores_idutilizador']==$_SESSION['userID']){
						
						if($_SESSION['userLevel']=='2'){
							echo "<td colspan='3' align='right' bgcolor='#E0E0E0'>
							
							<a href='escolherAlunoInicio.php?id=".$dado['idpropostas']."  onclick='return checkDelete()'> 
							<img  src='../img/cruzVermelha.png' alt='add_icon'>
							</a>
							
							</td>";
							
						}else{
							echo "<td colspan='3' align='right' bgcolor='#E0E0E0'>
							
							<a href='apagarProposta2.php?id=".$dado['idpropostas']."' onclick='return checkDelete()'> 
							<img  src='../img/cruzVermelha.png' alt='add_icon'>
							</a>
							
							</td>";
						}
						
					}else{
					
					echo "
					<td colspan='3' bgcolor='#E0E0E0'>
					</td>
					";
					}
					
					echo "</tr>";
				
					echo "<tr >";
					echo "<td colspan='4' bgcolor='#E5FFCC'>" . $dado['titulo'] . "</td>";
					echo "</tr>";
					
					echo "<tr >";
					echo "<td colspan='4' bgcolor='#CCFF99'>" . $dado['texto'] . "</td>";
					echo "</tr>";
					
					echo "<tr >";
					echo "<td >
					Postado em:
					" . $dado['data'] . "</td>";
					echo "<td >
					<img id='alter_icon' src='../img/data.png'>
					" . $dado['expiracao'] . "</td>";
					echo "<td >" . $dado['vinculo'] . "</td>";
					
					if($dado['utilizadores_idutilizador']==$_SESSION['userID']){
					echo "<td  align='right'>
					<a href='editProp.php?id=".$dado['idpropostas']."'> 
					<img id='alter_icon' src='../img/editProp.png'>
					</a>
					</td>
					";}echo "
					
					</tr>";
					
		
					echo "<tr >
					<td style='padding: 0px;' colspan='4' align='center'>
					<img id='alter_icon' width='100%' height='2' align='center' src='../img/bar.png'>
					</td>
					</tr>
					";		
					
					//}
					}
					echo "</table></center>";
					
				
	?>	
		
		
		
		
		</div>
		<?php include 'footer.php';?>
		</div>
		
		</body>
		
	</html>
	
<?php
	
	}else{
		echo "<script>alert('A sua conta ainda não foi ativada pelo administrador, aguarde!');top.location.href='../index.html';</script>";
	}
	
	
	}else{
	echo "<script>alert('Inicie Sessão primeiro!');top.location.href='../index.html';</script>";
	}
?>

