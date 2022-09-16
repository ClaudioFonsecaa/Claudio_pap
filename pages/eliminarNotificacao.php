<!DOCTYPE html>
<meta charset="UTF-8">

<?php

include "connect.php";

$id = $_GET['id'];


$query = "DELETE FROM notifications WHERE  idnotifications=$id ";

$resultado = mysqli_query($connection, $query); //or die("Error: ".mysqli_error($connection));


if(!$resultado){
echo 'erro';}
else{
echo "<script>alert('Notificação apagada com sucesso!');top.location.href='notificacao.php';</script>";
}

?>

