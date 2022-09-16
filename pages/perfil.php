<?php
session_start();

$id = $_SESSION['userID'];

if (isset($_SESSION["user"]) && null != ($_SESSION["user"]))

{
?>
	<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/style.css">
	
		<title>Perfil</title>
		<link rel="shortcut icon" href="../img/favicon.ico" >
	
	<style>
	input{
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #D3D3D3;
  width: 100%;
  border: 0;
  margin: 0 0 10px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
  color: #6d6d6d;
  
}

input[type=date], select {
      font-family: "Roboto", sans-serif;
  outline: 0;
  background: #D3D3D3;
  width: 100%;
  border: 0;
  margin: 0 0 10px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

input[type=submit] {
      font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

#botao_desvincular{
      font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #961e1e;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
	
	</style>
		
		</head>
		<body>
		

		<?php include 'header.php';
		include 'connect.php';
		?>
		
		<div class="pagina">
		
		 <div class="caixa_branca">
		 
		 
		 
		<h1 align='center'> Atualizar Informação </h1>
		
		<?php
		if($_SESSION['userLevel']==2){//---------------------------------------------empresa
		
		
		$query2 = "select * from empresas, utilizadores where empresas.utilizadores_idutilizador=utilizadores.idutilizador and empresas.utilizadores_idutilizador= '$id'  ";
				

		$result2 = mysqli_query($connection, $query2) or die("Error: ".mysqli_error($connection));
			
		$ob2 = mysqli_fetch_object($result2);
		
	
		
		
		echo "	
		<div class='tabelaPerfil'>	
		<form method='POST' action='update_info.php' enctype='multipart/form-data'>
	 
	<TABLE BORDER='0'>
  <TR>
   <TD>
    <TABLE BORDER='0'>
     <TR>
      <td><input type='text' placeholder='Nome da Empresa' value='$ob2->nome_utilizador' pattern='[A-Za-z]{5,}' title='Deve conter no mínimo 5 letras, sem caracters especiais!' name='nome_empresa' id='nome_empresa' /></td>
	  
	  
     </TR>
	 <tr>
	 <td><input type='text' placeholder='Email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' value='$ob2->email_empresa' name='email' id='email' /></td>
	 
	 
	 </tr>
	 <tr>
	 <td><input type='text' placeholder='Morada' value='$ob2->morada_empresa' name='morada' id='morada' /></td>
	 
	 
	 </tr>
	 <tr>
	 <td><input type='text' placeholder='Contacto' value='$ob2->contacto_empresa' name='contacto' type='number' onkeypress='return isNumberKey(event)'/></td>
	 
	 </tr>

	 
	 <tr>
	
		<td colspan='2'>
			<input type='submit' value='Atualizar Informação' name='atualizar_empresa'/>
		</td>
	 
	 </tr>
	 
	 
    </TABLE>
   </TD>
   
   </form>
   
   
   <TD>
    <TABLE BORDER='0'>
     
      <tr>
	  
	  <td>
	  
	  <form action='update_info.php' method='post' enctype='multipart/form-data'>
                        
						<label for='upload-photo'>
						<img id='add_img_icon' width='150' height='150' src='../img/add_img.png' alt='Profile Pic'>
						</label>
						<input type='file' name='file' id='upload-photo'>
                        
    
	  
	  </td>
	  
	  </tr>
	  
	  
	  <tr>
	  
	  <td><input type='submit' name='upload_photo' value='Alterar Foto'></td>
	  </form>
	  </tr>
      
	 
    </TABLE>
   </TD>
  </TR>
  
</TABLE>

<h1 align='center'>Alterar Password</h1>
		
		
		<form method='POST' action='update_info.php' enctype='multipart/form-data'>
		
		<table border='0'>
		
		
		
	   <tr>
		
	  <td><input type='password' placeholder='Password antiga' name='senha_antiga' id='password' required=''/></td>
		
	  </tr>
		
	  <tr>
	  
	  <td><input type='password' placeholder='Password nova' name='new_password' id='new_password' required=''/></td>
	  
	  </tr>
	  
	 <tr>
	  
	  <td>
	  <input type='password' placeholder=' Confirmação Password' name='confirmacao_senha' id='confirm_password' required=''/>
	  </td>
	  
	  </tr>
		
			 <tr>
		
		<td><input type='submit' name='alterarPassword' value='Alterar password'></td>
		
		 </tr>
		
		</form>
		
		
		
		</table>
		
		<table border='0'>
		
		<tr><td>
	  
	    <form action='desvincular.php' enctype='multipart/form-data'>         
             <br><br><br>
			 <input type='submit' id='botao_desvincular' name='desvincular_conta' value='Desvincular Conta'/>
			
	  </form>

	 </td></tr>
		
		</table>

		
			</div>
		
		";	
			
			
		}elseif($_SESSION['userLevel']==1){//---------------------------------------------aluno 
		
		
			
		
			$query = "select * from alunos, utilizadores where alunos.utilizadores_idutilizador=utilizadores.idutilizador and alunos.utilizadores_idutilizador= '$id'  ";
			

			$result= mysqli_query($connection, $query) or die("Error: ".mysqli_error($connection));
			
			$ob = mysqli_fetch_object($result);
			
			if($ob->ano=='1'){
			$ano='2015/2016';
			
		}else if ($ob->ano==2){
			$ano='2016/2017';
			
		}
		
		echo "
		<div class='tabelaPerfil'>
			
			<form method='POST' action='update_info.php' enctype='multipart/form-data'>
	
	<TABLE BORDER='0'>
  <TR>
   <TD>
    <TABLE BORDER='0'>
     <TR>
      <TD>
       <input type='text' placeholder='Nome Utilizador' required name='nome_utilizador' pattern='[A-Za-z]{5,}' title='Deve conter no mínimo 5 letras, sem caracters especiais!' value='$ob->nome_utilizador' />
      </TD>
	  <TD>
	  
	  
       <select name='ano' >";
		
		switch('ano'){
		
		case $ob->ano == '1'; echo "
				<option disabled>Selecione o ano letivo</option>
				<option value='1'>2015/2016</option>
				<option value='2'>2016/2017</option>
		
		"; break;
		
		case $ob->ano == '2'; echo "
				<option disabled>Selecione o ano letivo</option>
				<option value='2'>2016/2017</option>
				<option value='1'>2015/2016</option>
				
		
		"; break;
		
		default: echo "
				<option selected disabled>Selecione o ano letivo</option>
				<option value='1'>2016/2017</option>
				<option value='1'>2015/2016</option>
		";

		} echo "</select>
		
		
      </TD>
	  
     </TR>
	 <tr>
	 <td><input type='text' placeholder='Nome Próprio' name='nome_proprio' value='$ob->nome_proprio' /></td>
	 <td>
	 
	 
	<select id='curso' name='curso' required=''>";
		
		switch ('curso'){
				case $ob->curso == 'IG'; echo"
				
				<option value='IG'>Informática de Gestão</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				
				"; break;
				case $ob->curso == 'MEC'; echo"
				
				
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				
				"; break;
				
				case $ob->curso == 'EAC'; echo"
				
				
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				
			
				"; break;
				
				
				case $ob->curso == 'GPSI'; echo"
				
				
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				
				
				"; break;
				
				case $ob->curso == 'TUR'; echo"
				
				
				<option value='TUR'>Turismo</option>
				<option value='GEST'>Gestão</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				
				"; break;
				
				case $ob->curso == 'GEST'; echo"
				
				<option value='GEST'>Gestão</option>
				<option value='GPSI'>Gestão e Programação de Sistemas Informáticos</option>
				<option value='EAC'>Eletrónica, Automação e Comando</option>
				<option value='MEC'>Manutenção Industrial/Mecatrónica</option>
				<option value='IG'>Informática de Gestão</option>
				<option value='TUR'>Turismo</option>
				
				"; break;
		} echo "</select>
	 
	 
	 </td>
	 
	 </tr>
	 <tr>
	 <td><input type='text' placeholder='Email' name='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' value='$ob->email_aluno'/></td>
	 <td>
	 
	 
	<select id='estudos' name='estudos' required=''>";
		
		switch('estudos'){
			case $ob->estudos == 'Sim'; echo"
									<option value='Sim'>Sim</option>
									<option value='Não'>Não</option>
			"; break;
			
			case $ob->estudos == 'Não'; echo"
									<option value='Não'>Não</option>
									<option value='Sim'>Sim</option>
			"; break;		
									
									
		} echo "</select>
	 
	 
	 </td>
	 
	 </tr>
	 <tr>
	 <td> 
	 
	<select name='genero' required=''>";
		
		switch('genero'){
		
		case $ob->genero == 'Masc'; echo"
			<option value='Masc'>Masculino</option>
			<option value='Femin'>Feminino</option>
			"; break;
		
		case $ob->genero == "Femin"; echo"
			<option value='Femin'>Feminino</option>
			<option value='Masc'>Masculino</option>
			"; break;
			
		default: echo "
				<option selected disabled>Selecione o género</option>
				<option value='Masc'>Masculino</option>
				<option value='Femin'>Feminino</option>
		";
		
		} echo"</select>
	
	
	</td>
		
		
	 <td>
	 
	 <select id='empregado' name='empregado' required=''>";
		
		switch('estudos'){
			case $ob->estudos == 'Sim'; echo"
									<option value='Sim'>Sim</option>
									<option value='Não'>Não</option>
			"; break;
			
			case $ob->estudos == 'Não'; echo"
									<option value='Não'>Não</option>
									<option value='Sim'>Sim</option>
			"; break;
			
		} echo "</select>

	 
	 </td>
	 
	 </tr>
	 <tr>
	 <td><input type='date' name='nascimento' value='$ob->data'/></td>
	 <td>
	 
	 	 <select name='vinculo'>";
		 
		switch('vinculo'){
		
		case $ob->vinculo == 'Estágio Curricular'; echo"
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
		"; break;
		
		case $ob->vinculo == 'Estágio Profissional'; echo"
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
		"; break;
		
		case $ob->vinculo == 'Prestação de Serviços'; echo"
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
		"; break;
		
		case $ob->vinculo == 'Contrato a Termo'; echo"
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
		"; break;
		
		case $ob->vinculo == 'Contrato Sem Termo'; echo"
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
		"; break;
		
		default: echo "
			<option selected disabled >Selecione o vínculo</option>
			<option value='Estágio Curricular'>Estágio Curricular</option>
			<option value='Estágio Profissional'>Estágio Profissional</option>
			<option value='Prestação de Serviços'>Prestação de Serviços</option>
			<option value='Contrato a Termo'>Contrato a Termo</option>
			<option value='Contrato Sem Termo'>Contrato Sem Termo</option>
		";
		}
		
		echo "</select>
	 
	 
	 </td>
	 
	 </tr>
	 <tr>
	 <td><input type='text' placeholder='Morada' name='morada' value='$ob->morada_aluno'/></td>
	 <td></td>
	
	 </tr>
	 </tr>
	 <tr>
	 <td><input type='text' placeholder='Contacto' name='contacto' type='number' value='$ob->contacto_aluno' onkeypress='return isNumberKey(event)'/></td>
	 <td></td>
	
	 </tr>
	 <tr>
	
		<td colspan='2'>
			<input type='submit' value='Atualizar Informação' name='atualizar'/>
		</td>
	 
	 </tr>
    </TABLE>
   </TD>
   
   </form>
   
   <TD>
    <TABLE BORDER='0'>
     
      <tr><td>
	  <form action='update_info.php' method='post' enctype='multipart/form-data'>
                        
						<label for='upload-photo'>
						<img id='add_img_icon' width='150' height='150' src='../img/add_img.png' alt='Profile Pic'>
						</label>
						<input type='file' name='file' id='upload-photo' required=''/>
                        <input type='submit' name='upload_photo' value='Alterar Foto'/>
    </form>
	  
	  </td></tr>
	  <tr><td>
	  
	  <form action='update_info.php' method='post' enctype='multipart/form-data'>
                        
						<label for='upload-file'>
						<img id='add_img_icon' width='150' height='150' src='../img/add_file.png' alt='Profile Pic'>
						</label>
						<input type='file' name='file' id='upload-file' required=''/>
						
                        <input type='submit' name='upload_file' value='Adicionar Ficheiro'/>
	
	  </form>
	  
	  </td></tr>
     

    </TABLE>
   </TD>
  </TR>
  
</TABLE>	
		
		
		
		<h1 align='center'>Alterar Password</h1>
		
		
		<form method='POST' action='update_info.php' enctype='multipart/form-data'>
		
		<table border='0'>
		
		
		
	   <tr>
		
	  <td><input type='password' placeholder='Password antiga' name='senha_antiga' id='password' required=''/></td>
		
	  </tr>
		
	  <tr>
	  
	  <td><input type='password' placeholder='Password nova' name='new_password' id='new_password' required=''/></td>
	  
	  </tr>
	  
	 <tr>
	  
	  <td><input type='password' placeholder=' Confirmação Password' name='confirmacao_senha' id='confirm_password' required=''/></td>
	  
	  </tr>
		
			 <tr>
		
		<td><input type='submit' name='alterarPassword' value='Alterar password'></td>
		
		 </tr>
		
		</form>
		
		
		
		</table>
		
		<table border='0'>
		
		<tr><td>
	  
	    <form action='desvincular.php' enctype='multipart/form-data'>         
             <br><br><br>
			 <input type='submit' id='botao_desvincular' name='desvincular_conta' value='Desvincular Conta'/>
			
	  </form>

	 </td></tr>
		
		</table>
		
		
		
		</div>
			
	";		
			
				
		}
		?>
		
		<script>
var password = document.getElementById("new_password") , confirm_password = document.getElementById("confirm_password");
function validatePassword(){
if(password.value != confirm_password.value) {
 confirm_password.setCustomValidity("Senhas diferentes!");
} else {
 confirm_password.setCustomValidity('');
}
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


</script>
		
		
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

