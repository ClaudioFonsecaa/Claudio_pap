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
		</head>
		<body>
		
		<?php include 'header.php';
			$id = $_GET['id'];
			$nome = $_GET['nome'];
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 <?php    
		 
		 
		 $q = mysqli_query($connection,"SELECT * FROM alunos, utilizadores WHERE alunos.utilizadores_idutilizador = '".$id."' and utilizadores.idutilizador = '".$id."'");
         $row = mysqli_fetch_assoc($q);
		 
                               
		if($row['registado'] == "Sim"){

							   if($row['ficheiro'] == ""){
                                        
										echo "<script>alert('O aluno não possui ficheiros!');top.location.href='alunos.php';</script>";
										
                                } else {
									
										$file_loc = "../utilizadores/".$row['nome_utilizador']."/files/".$row['ficheiro']." ";
										
										 echo "
										<object data='$file_loc' type='application/pdf' width='100%' height='100%'>
											<p>Ocorreu um erro, por favor tente mais tarde!</p>
										</object>
		
										";
										
                                } 
		}elseif ($row['registado'] == "Não"){
			
								$query = "select * from alunos where nome_proprio='$nome' and utilizadores_idutilizador='$id' ";
								$q2 = mysqli_query($connection, $query);
								$row2 = mysqli_fetch_assoc($q2);
							

							  if($row2['ficheiro'] == ""){
                                        
										echo "<script>alert('O aluno não possui ficheiros!');top.location.href='alunos.php';</script>";
										
                                } else {
									
										$file_loc2 = "../utilizadores/".$row2['nome_proprio']."/files/".$row2['ficheiro']." ";
										
										 echo "
										<object data='$file_loc2' type='application/pdf' width='100%' height='100%'>
											<p>Ocorreu um erro, por favor tente mais tarde!</p>
										</object>
		
										";
										
		
										
                                } 
			
			
			
			
			
			
		}

		 ?>
		 
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

