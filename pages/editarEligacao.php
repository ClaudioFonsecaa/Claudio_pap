<!DOCTYPE html>
<meta charset="UTF-8">

<?php

include "connect.php";


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
				
				
				$query2="UPDATE empresas SET $query_data2 WHERE utilizadores_idutilizador = '".$_GET['id']."'";
			
			
				$resultado = mysqli_query($connection, $query2);
				
				}


if(!$resultado){
echo 'erro';}
else{
echo "<script>alert('Informações alteradas com sucesso!');top.location.href='empresas.php';</script>";
}

?>