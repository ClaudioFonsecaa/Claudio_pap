<!DOCTYPE html>
<meta charset="UTF-8">
 
<?php 

	session_start();
	include 'connect.php';
	
	
	
	if($_SESSION["userLevel"]==1){//---------------------------------------------aluno 
	if(isset($_POST['upload_photo'])){
	
				
				$username = $_SESSION['user'];
				
				//echo $username;
				
				//echo $_SESSION['userID'];
				
				$name_file = $_FILES['file']['name'];
				$tmp_name = $_FILES['file']['tmp_name'];
				$local_image= "../utilizadores/$username/pictures/";
				
				
				$upload = copy ($tmp_name, $local_image.$name_file);
				
				
                if($upload){
					//echo "<br>imagem movida com sucesso!";
					mysqli_query($connection,"UPDATE alunos SET imagem = '".$_FILES['file']['name']."' WHERE utilizadores_idutilizador = '".$_SESSION['userID']."'");
					echo "<script>alert('Imagem alterada com sucesso!');top.location.href='perfil.php';</script>";
					
				}else{
					echo "<br>imagem não foi movida!";
				}
			
				
				/*echo "</p>";
				echo '<pre>';
				echo 'Here is some more debugging info:';
				print_r($_FILES);
				print "</pre>";*/
			
    }
	
	if(isset($_POST['upload_file'])){
		
		
				$username = $_SESSION['user'];
				
				
				$name_file = $_FILES['file']['name'];
				$tmp_name = $_FILES['file']['tmp_name'];
				$local_image= "../utilizadores/$username/files/";
				
				
				$upload = copy ($tmp_name, $local_image.$name_file);
				
				
                if($upload){
					//echo "<br>imagem movida com sucesso!";
					mysqli_query($connection,"UPDATE alunos SET ficheiro = '".$_FILES['file']['name']."' WHERE utilizadores_idutilizador = '".$_SESSION['userID']."'");
					echo "<script>alert('Ficheiro carregado com sucesso!');top.location.href='perfil.php';</script>";
				}else{
					echo "<br>imagem não foi movida!";
				}
		
		
				//echo "<script>alert('Arranjar isto depois!');top.location.href='perfil.php';</script>";
    }
	
	
	if(isset($_POST['alterarPassword'])){
	
			$user=$_SESSION['userID'];
		
			$query3 = mysqli_query($connection, "SELECT * FROM utilizadores WHERE idutilizador = '$user' ") or die("Error: ".mysqli_error($connetion));
		
			$ob = mysqli_fetch_object($query3);
	
			$passwordBD=$ob->password;
			
			
			if(md5($_POST['senha_antiga'])==$passwordBD){
				
				
				$query = "UPDATE utilizadores SET password = MD5('".$_POST['new_password']."') WHERE idutilizador ='".$_SESSION['userID']."'";
				
				mysqli_query($connection, $query);
				
				echo "    <meta charset='utf-8'> <script javalanguage='script' type='text/javascript'> alert('Password alterada com sucesso!'); window.location.replace('perfil.php'); </script>";
			}else{
				echo "    <meta charset='utf-8'> <script javalanguage='script' type='text/javascript'> alert('A password antiga não coincide!'); window.location.replace('perfil.php');</script>";
			}
	
	}
	
	 
	if(isset($_POST['atualizar'])){
		
		
		
		$contador=0;
			
				if( !empty($_POST['nome_proprio'])){ 
					$query_data[]= "nome_proprio='".$_POST['nome_proprio']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['email'])){ 
					$query_data[]= "email_aluno='".$_POST['email']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['ano'])){
					$query_data[]= "ano='".$_POST['ano']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['curso'])){
					$query_data[]= "curso='".$_POST['curso']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['estudos'])){
					$query_data[]= "estudos='".$_POST['estudos']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['genero'])){
					$query_data[]= "genero='".$_POST['genero']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['empregado'])){
					$query_data[]= "empregado='".$_POST['empregado']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['nascimento'])){
					$query_data[]= "data='".$_POST['nascimento']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['morada'])){
					$query_data[]= "morada_aluno='".$_POST['morada']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['contacto'])){
					$query_data[]= "contacto_aluno='".$_POST['contacto']."'";
					$contador=$contador+1;
				}
				if( !empty($_POST['vinculo'])){
					$query_data[]= "vinculo='".$_POST['vinculo']."'";
					$contador=$contador+1;
				}
				
			echo $contador;
			
			if($contador>0){	
				$query_data = implode(",", $query_data);
			
		
			$query = "Update alunos SET $query_data WHERE utilizadores_idutilizador = '".$_SESSION['userID']."'";
			
			mysqli_query($connection, $query);
			}
			
			if(!empty($_POST['nome_utilizador'])){ 
			
					$pastaAntiga = "../utilizadores/".$_SESSION['user'];
			
					$user=$_POST['nome_utilizador'];
					
					$pastaNova = "../utilizadores/$user";
					
					$query2 = "UPDATE utilizadores SET nome_utilizador='$user' WHERE idutilizador ='".$_SESSION['userID']."'";
					$query3 = "UPDATE propostas SET utilizador='$user' WHERE utilizadores_idutilizador ='".$_SESSION['userID']."'";
					
					mysqli_query($connection, $query2);
					mysqli_query($connection, $query3);
					
					$_SESSION['user'] = $_POST['nome_utilizador'];
					
					rename($pastaAntiga,$pastaNova);
					
					
			}
			
			echo "    <meta charset='utf-8'> <script javalanguage='script' type='text/javascript'> alert('Informações atualizadas com sucesso!'); window.location.replace('perfil.php'); </script>";
			
	}
	
	
	}elseif($_SESSION["userLevel"]==2){ //---------------------------------------------empresa

	if(isset($_POST['alterarPassword'])){
	
			$user=$_SESSION['userID'];
		
			$query3 = mysqli_query($connection, "SELECT * FROM utilizadores WHERE idutilizador = '$user' ") or die("Error: ".mysqli_error($connetion));
		
			$ob = mysqli_fetch_object($query3);
	
			$passwordBD=$ob->password;
			
			
			if(md5($_POST['senha_antiga'])==$passwordBD){
				
				
				$query = "UPDATE utilizadores SET password = MD5('".$_POST['new_password']."') WHERE idutilizador ='".$_SESSION['userID']."'";
				
				mysqli_query($connection, $query);
				
				echo "    <meta charset='utf-8'> <script javalanguage='script' type='text/javascript'> alert('Password alterada com sucesso!'); window.location.replace('perfil.php'); </script>";
			}else{
				echo "    <meta charset='utf-8'> <script javalanguage='script' type='text/javascript'> alert('A password antiga não coincide!'); window.location.replace('perfil.php');</script>";
			}
	
	}
	
	

	if(isset($_POST['atualizar_empresa'])){
			
	$contador2=0;
			
				if( !empty($_POST['email'])){ 
					$query_data2[]= "email_empresa='".$_POST['email']."'";
					$contador2=$contador2+1;
				}
				if( !empty($_POST['morada'])){ 
					$query_data2[]= "morada_empresa='".$_POST['morada']."'";
					$contador2=$contador2+1;
				}
				if( !empty($_POST['contacto'])){ 
					$query_data2[]= "contacto_empresa='".$_POST['contacto']."'";
					$contador2=$contador2+1;
				}
				
				if($contador2>0){	
				$query_data2 = implode(",", $query_data2);
				
				
				$query2="UPDATE empresas SET $query_data2 WHERE utilizadores_idutilizador = '".$_SESSION['userID']."'";
			
			
				mysqli_query($connection, $query2);
				
				}
				
				if(!empty($_POST['nome_empresa'])){ 
			
					$pastaAntiga = "../utilizadores/".$_SESSION['user'];
					
					$user=$_POST['nome_empresa'];
					
					$pastaNova = "../utilizadores/$user";
					
					$query = "UPDATE utilizadores SET nome_utilizador='$user' WHERE idutilizador ='".$_SESSION['userID']."'";
					$query2 = "UPDATE propostas SET utilizador='$user' WHERE utilizadores_idutilizador ='".$_SESSION['userID']."'";
					
					mysqli_query($connection, $query);
					mysqli_query($connection, $query2);
					
					$_SESSION['user'] = $_POST['nome_empresa'];
					
					rename($pastaAntiga,$pastaNova);
					
			}



	/*
	
	$query = "UPDATE utilizadores SET nome_utilizador ='".$_POST['nome_empresa']."', password = MD5('".$_POST['senha_nova']."') WHERE idutilizador ='".$_SESSION['userID']."'";
	
	mysqli_query($connection, $query);
	
	$_SESSION["user"] = $_POST['nome_empresa'];*/
	
	
	
	echo "    <meta charset='utf-8'> <script javalanguage='script' type='text/javascript'> alert('Informações atualizadas com sucesso!'); window.location.replace('perfil.php'); </script>";
    }
	
	
	
	
	
	
	if(isset($_POST['upload_photo'])){
	
			
	
				/*$path = "../img/profiles/pictures/".$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $path);
				mysqli_query($connection,"UPDATE empresas SET imagem = '".$_FILES['file']['name']."' WHERE utilizadores_idutilizador ='".$_SESSION['userID']."'");
		
		
				echo "<script>alert('Imagem alterada com sucesso!');top.location.href='perfil.php';</script>";*/
				
				
				$username = $_SESSION['user'];
			
				
				$name_file = $_FILES['file']['name'];
				$tmp_name = $_FILES['file']['tmp_name'];
				$local_image= "../utilizadores/$username/pictures/";
				
				
				$upload = copy ($tmp_name, $local_image.$name_file);
				
				
                if($upload){
					//echo "<br>imagem movida com sucesso!";
					mysqli_query($connection,"UPDATE empresas SET imagem = '".$_FILES['file']['name']."' WHERE utilizadores_idutilizador = '".$_SESSION['userID']."'");
					echo "<script>alert('Imagem alterada com sucesso!');top.location.href='perfil.php';</script>";
					
				}else{
					echo "<br>imagem não foi movida!";
				}
			
	
				
    }
	
	}
?>