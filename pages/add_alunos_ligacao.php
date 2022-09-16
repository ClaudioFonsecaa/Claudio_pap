<!DOCTYPE html>
<meta charset="UTF-8">

<?php

			session_start();
			include 'connect.php';
			
			
		 $nome = $_POST['nome'];
		  
		  $genero = $_POST['genero'];
		  
		 $data = $_POST['nascimento'];
		  
		  $ano = $_POST['ano'];
		  
		  $contacto = $_POST['contacto'];
		  
		   $morada = $_POST['morada'];
		  
		  $registar = $_POST['registar'];
		  
		  $email = $_POST['email'];
		  
		  $curso = $_POST['curso'];
		  
		  $tipo = 1;
		  
		  $estudos = $_POST["estudos"];
		  
		  $empregado = $_POST["empregado"];
		  
		  if(isset($_POST['registar'])){
		  
		  mkdir('../utilizadores/'.$nome.'', 0777, true);
		mkdir('../utilizadores/'.$nome.'/files', 0777, true);
		mkdir('../utilizadores/'.$nome.'/pictures', 0777, true);
		  
		  
		  
		  
		  $query = "INSERT INTO alunos (nome_proprio, data, genero, morada_aluno,contacto_aluno,email_aluno, curso, ano, estudos, empregado , utilizadores_idutilizador, registado)VALUES ('$nome', '$data', '$genero','$morada','$contacto','$email', '$curso', '$ano','$estudos', '$empregado', '1', 'Não')";
		  mysqli_query($connection, $query);
		  
		  $query2 = "select * from alunos where nome_proprio='$nome' and utilizadores_idutilizador='1' ";
		  $result = mysqli_query($connection, $query2);
		  $dado = mysqli_fetch_array($result);
		  $userID=$dado['idaluno'];
			
		
				
				if($_FILES['file']['name'] != 0) {
				$name_file = $_FILES['file']['name'];
				$tmp_name = $_FILES['file']['tmp_name'];
				$local_image= "../utilizadores/$nome/files/";
				$upload = copy ($tmp_name, $local_image.$name_file);
				
				
					if($upload){
						//echo "<br>imagem movida com sucesso!";
						mysqli_query($connection,"UPDATE alunos SET ficheiro = '".$_FILES['file']['name']."' WHERE idaluno = '$userID' ");
						echo "<script>alert('Aluno registado com sucesso!');top.location.href='alunos.php';</script>";
					}else{
						
						echo "<script>alert('Aluno registado com sucesso!');top.location.href='alunos.php';</script>";
						
					}	
					
					
				}else{
					echo "<script>alert('Aluno registado com sucesso!');top.location.href='alunos.php';</script>";
				}
		
			
				
		}	
				
?>