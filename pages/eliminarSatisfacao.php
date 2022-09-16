<!DOCTYPE html>
<meta charset="UTF-8">

<?php

include "connect.php";


$resultado = mysqli_query($connection,"DELETE FROM satisfacao WHERE  idsatisfacao=".$_GET['id']." ");

if(!$resultado){
echo 'erro';}
else{
echo "<script>alert('Inquérito apagado com sucesso!');top.location.href='notificacao.php';</script>";
}

?>