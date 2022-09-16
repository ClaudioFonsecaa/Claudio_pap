<meta charset="UTF-8">

<?php 

session_start();

//-----------------------------------Resgistar alunos
 if($_SESSION["nivel"]==1){
  $login = $_POST['login'];
  
  $registar = $_POST['registar'];
  
  $senha = $_POST['senha'];
  
  $nproprio = $_POST['nproprio'];
  
  $confsenha = $_POST['confsenha'];
  
  $email = $_POST['email'];
  
  $curso = $_POST['curso'];
  
  $tipo = $_SESSION["nivel"];
  
  $estudos = $_POST["estudos"];
  
  $empregado = $_POST["empregado"];
  
  
  
  $connection = mysqli_connect('127.0.0.1','root','rootroot');
  
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

  $db = mysqli_select_db($connection,'pap');
  
 

 
 if (isset ($_POST['registar'])) { 
  
  if(!file_exists('../utilizadores/'.$login.'')){
  
  
  
 mysqli_query($connection, "Insert into utilizadores (idutilizador, nome_utilizador, password, nivel, estado) values (NULL,'$login', MD5('$senha'), '$tipo', 'ativo')");

 mysqli_query($connection,"INSERT INTO alunos (nome_proprio, email_aluno, curso, estudos, empregado , utilizadores_idutilizador, registado)VALUES ('$nproprio', '$email', '$curso', '$estudos', '$empregado', LAST_INSERT_ID(), 'Sim')");
	
	
	
	
		mkdir('../utilizadores/'.$login.'', 0777, true);
		mkdir('../utilizadores/'.$login.'/files', 0777, true);
		mkdir('../utilizadores/'.$login.'/pictures', 0777, true);
		
	
		echo"<script language='javascript' type='text/javascript'>alert('Aluno registado com sucesso!');window.location.href='../index.html';</script>";	
	}else{
		echo"<script language='javascript' type='text/javascript'>alert('Já existe um utilizador com o mesmo nome!!');window.location.href='registoalun.php';</script>";	
	}
	//--------------------------------------------------------
	
	
  die();
  
  header("Location:index.html");   
  
  
  }
 
}elseif ($_SESSION["nivel"]==2) { //--------------------------------------------Registar empresas

$login = $_POST['EmpNome'];
  
  $registar = $_POST['registar'];
  
  $senha = $_POST['senha'];
  
  $confsenha = $_POST['confsenha'];
  
  $email = $_POST['email'];
  
  $tipo = $_SESSION["nivel"];
   
  
  $connection = mysqli_connect('127.0.0.1','root','rootroot');
  
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

  $db = mysqli_select_db($connection,'pap');
  
 

 
 if (isset ($_POST['registar'])) { 
 
 
		if(!file_exists('../utilizadores/'.$login.'')){
		
							$string="INSERT INTO empresas (email_empresa, utilizadores_idutilizador) 
						  VALUES ('$email', LAST_INSERT_ID())";
							
							 mysqli_query($connection, "Insert into utilizadores (idutilizador, nome_utilizador, password, nivel, estado) values (NULL, '$login', MD5('$senha'), '$tipo', 'desativo')");
							
							mysqli_query($connection, $string) or die($string);
							
							mkdir('../utilizadores/'.$login.'', 0777, true);
							mkdir('../utilizadores/'.$login.'/files', 0777, true);
							mkdir('../utilizadores/'.$login.'/pictures', 0777, true);

							
						echo"<script language='javascript' type='text/javascript'>alert('Aguarde pela confirmação da conta');window.location.href='../index.html';</script>";
						die();
						      
		}else{
		echo"<script language='javascript' type='text/javascript'>alert('Já existe um utilizador com o mesmo nome!!');window.location.href='registoemp.php';</script>";	
		}

	}
}

?>