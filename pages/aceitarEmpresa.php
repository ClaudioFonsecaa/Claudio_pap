<!DOCTYPE html>
<meta charset="UTF-8">

<?php

include "connect.php";


$resultado = mysqli_query($connection,"UPDATE `utilizadores` SET `estado`='ativo' WHERE `idutilizador`=".$_GET['id']." ");

if(!$resultado){
echo 'erro';}
else{
echo "<script>alert('Empresa aceite com sucesso!');top.location.href='notificacao.php';</script>";
}

?>