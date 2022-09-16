<!DOCTYPE html>
<meta charset="UTF-8">

<?php

include "connect.php";

			$contador=0;
			
				if( !empty($_POST['nome'])){ 
					$query_data[]= "nome_proprio='".$_POST['nome']."'";
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
				if( !empty($_POST['data'])){
					$query_data[]= "data='".$_POST['data']."'";
					$contador=$contador+1;
				}
	
			
			if($contador>0){	
			$query_data = implode(",", $query_data);
			
		
			$query = "Update alunos SET $query_data WHERE `idaluno`=".$_GET['id']." ";
			
			$resultado = mysqli_query($connection, $query);
			}
	
	

//$resultado = mysqli_query($connection,"UPDATE `alunos` SET `nome_proprio`='".$_POST['nome']."',`email_aluno`='".$_POST['email']."',`vinculo`='".$_POST['vinculo']."',`genero`='".$_POST['genero']."',`data`='".$_POST['data']."',`morada_aluno`='".$_POST['morada']."',`contacto_aluno`='".$_POST['contacto']."',`ano`='".$_POST['ano']."',`curso`='".$_POST['curso']."',`estudos`='".$_POST['estudos']."',`empregado`='".$_POST['empregado']."' WHERE `idaluno`=".$_GET['id']."");

if(!$resultado){
echo 'erro';}
else{
echo "<script>alert('Informações alteradas com sucesso!');top.location.href='alunos.php';</script>";
}

?>