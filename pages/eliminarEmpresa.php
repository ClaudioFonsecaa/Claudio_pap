<!DOCTYPE html>
<meta charset="UTF-8">

<?php
   $dbhost = '127.0.0.1';
   $dbuser = 'root';
   $dbpass = 'rootroot';
   $dbname = 'pap';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
   $user=$_GET['id'];
   
	$query = mysqli_query($conn, "SELECT * FROM utilizadores WHERE idutilizador = '$user' ") or die("Error: ".mysqli_error($conn));
		
	$ob = mysqli_fetch_object($query);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   echo 'Connected successfully<br>';
   $sql = " DELETE FROM empresas WHERE utilizadores_idutilizador = '$user' ";
   $sql2 = " DELETE FROM utilizadores WHERE idutilizador = '$user' ";
   
   $pasta=$ob->nome_utilizador;
  
   rmdir('../utilizadores/'.$pasta.'/files');
   rmdir('../utilizadores/'.$pasta.'/pictures');
   rmdir('../utilizadores/'.$pasta);
   
   if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
   
   if (mysqli_query($conn, $sql2)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
   
   mysqli_close($conn);
   
   header("Location: notificacao.php");
?>