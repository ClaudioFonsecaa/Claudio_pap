<!DOCTYPE html>
<meta charset="UTF-8">

<?php
		function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
		
		include "connect.php";

		$login = $_POST['login'];
		$email = $_POST['email'];
		$passwordEmail = '';
		
		
		$query = "select * from utilizadores, alunos where nome_utilizador='$login' && email_aluno='$email'";
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		
		$query2 = "select * from utilizadores, empresas where nome_utilizador='$login' && email_empresa='$email'";
		$result2 = mysqli_query($connection, $query2) or die(mysqli_error($connection));
		
		if (mysqli_num_rows($result) > 0){ //fazer caso seja aluno
		
					$assunto = "Recuperação Password Plataforma SPO";
					$mensagem = "A sua password é a seguinte: ";
					
					$dado = mysqli_fetch_array($result);
					$id = $dado['idutilizador'];
					
					require_once("../phpmailer/class.phpmailer.php");

					$mail = new phpmailer;
					$password = randomPassword();
					
					$mail->CharSet = 'UTF-8';
					$mail->isSMTP();                                  
					$mail->Host = "";         //Alterar
					$mail->SMTPAuth = true;                  
					$mail->Username = "";           //Alterar
					$mail->Password = $passwordEmail;        //Alterar
					$mail->Port = 25;
					$mail->From = '';       //Alterar
					$mail->FromName = 'Plataforma SPO';
					$mail->addAddress($email);   //Alterar    
					$mail->WordWrap = 50;                                    //Numero de caracteres                     
					$mail->isHTML(true);                                  
					$mail->Subject = $assunto;
					$mail->Body = "Plataforma SPO!<br> $mensagem $password <br><br>Não responda para este email, obrigado :)<br>";//".$mensagem."".$password.""

					//echo $password."<br> ";
					
					//password = MD5('$senha')
					
					$query_aluno = "UPDATE utilizadores SET password = MD5('$password') WHERE idutilizador=$id ";
					//echo $query_aluno;
					mysqli_query($connection, $query_aluno) or die(mysqli_error($connection));
					
					
					if(!$mail->send()) {
							echo 'Mensagem nao enviada. Tente Novamente <br>';
							echo 'Mailer Error: '.$mail->ErrorInfo;
					} else {
							echo "<script>alert(\"Mensagem enviada com sucesso! Consulte o seu email ! \")</script>"; //Mensagem que aparece ao enviar
							echo("<script lang=\"javascript\">window.location.href = 'recuperarPassword.php'</script>"); //Página quando enviado
					}
			
			
			
		}elseif(mysqli_num_rows($result2) > 0){ //fazer caso seja empresa
			
			
					$assunto = "Recuperação Password Plataforma SPO";
					$mensagem = "A sua password é a seguinte: ";
					
					$dado2 = mysqli_fetch_array($result2);
					$id = $dado2['idutilizador'];
					
					require_once("../phpmailer/class.phpmailer.php");

					$mail = new phpmailer;
					$password = randomPassword();
					
					$mail->CharSet = 'UTF-8';
					$mail->isSMTP();                                  
					$mail->Host = "";         //Alterar
					$mail->SMTPAuth = true;                  
					$mail->Username = "";           //Alterar
					$mail->Password = $passwordEmail;        //Alterar
					$mail->Port = 25;
					$mail->From = '';       //Alterar
					$mail->FromName = 'Plataforma SPO';
					$mail->addAddress($email);   //Alterar    
					$mail->WordWrap = 50;                                    //Numero de caracteres                     
					$mail->isHTML(true);                                  
					$mail->Subject = $assunto;
					$mail->Body = "Plataforma SPO!<br> $mensagem $password <br><br>Não responda para este email, obrigado :)<br>";//".$mensagem."".$password.""

					//echo $password."<br> ";
					
					//password = MD5('$senha')
					
					$query_aluno = "UPDATE utilizadores SET password = MD5('$password') WHERE idutilizador=$id ";
					//echo $query_aluno;
					mysqli_query($connection, $query_aluno) or die(mysqli_error($connection));
					
					
					if(!$mail->send()) {
							echo 'Mensagem não enviada. Tente Novamente mais tarde! <br>';
							echo 'Mailer Error: '.$mail->ErrorInfo;
					} else {
							echo "<script>alert(\"Mensagem enviada com sucesso! Consulte o seu email ! \")</script>"; //Mensagem que aparece ao enviar
							echo("<script lang=\"javascript\">window.location.href = 'recuperarPassword.php'</script>"); //Página quando enviado
					}
			
			
		}else{
			echo "<script>alert('O nome de utilizar ou email estão incorretos!');top.location.href='recuperarPassword.php';</script>";
		}
       
	   
?>
