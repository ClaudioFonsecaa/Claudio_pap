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
   $sql = " DELETE FROM alunos WHERE utilizadores_idutilizador = '$user' ";
   $sql2 = " DELETE FROM utilizadores WHERE idutilizador = '$user' ";
   
   $pasta=$ob->nome_utilizador;
   
   
   $files = glob('../utilizadores/'.$pasta.'/files/*'); 
	foreach($files as $file){
    if(is_file($file))
    unlink($file); 
	}
	
	$files = glob('../utilizadores/'.$pasta.'/pictures/*'); 
	foreach($files as $file){
    if(is_file($file))
    unlink($file); 
	}
   
  
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
   
   header("Location: alunos.php");
?>