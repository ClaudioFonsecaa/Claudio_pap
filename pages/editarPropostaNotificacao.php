<!DOCTYPE html>
<meta charset="UTF-8">

<?php

include "connect.php";



$resultado = mysqli_query($connection,"UPDATE `propostas` SET `curso`='".$_POST['curso']."', `vinculo`='".$_POST['vinculo']."',`expiracao`='".$_POST['expiracao']."',`estado`='".$_POST['estado']."',`texto`='".$_POST['texto']."',`titulo`='".$_POST['titulo']."' WHERE `idpropostas`=".$_GET['id']." ");

if(!$resultado){
echo 'erro';}
else{
echo "<script>alert('Informações alteradas com sucesso!');top.location.href='notificacao.php';</script>";
}

?>