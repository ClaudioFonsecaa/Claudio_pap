<!DOCTYPE html>
<meta charset="UTF-8">

<?php 

  session_start();

  $login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senha = $_POST['senha'];
  $_SESSION['user'] = $login;
  $_SESSION['password'] = $senha;
	  
  $connection = mysqli_connect('127.0.0.1','root','rootroot');
  
  
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

  $db = mysqli_select_db($connection,'pap');
    if (isset($entrar)) {
            
      $verifica = mysqli_query($connection,"SELECT * FROM utilizadores WHERE nome_utilizador = '$login' AND password = MD5('$senha')") or die("erro ao selecionar");
       
	   if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../index.html';</script>";
          die();
        
		}else{
      
		//-----------------------------
			
			$ob = mysqli_fetch_object($verifica);
			
				session_name("spo");
			
				$_SESSION['userLevel'] = $ob->nivel;
				$_SESSION['userID'] = $ob->idutilizador;
				$_SESSION['user'] = $ob->nome_utilizador;
				$_SESSION['userEstado'] = $ob->estado;
			
			if(!empty($_SESSION['userLevel']))
				{
					if($ob->nivel != null){
						header('Location:inicio.php');   
					}else{
						echo("Nao está ativo");
					}
					
				}
		
		//-----------------------------
	
        }
    }

?>