
<?php
	
	session_start();

   $dbhost = '127.0.0.1';
   $dbuser = 'root';
   $dbpass = 'rootroot';
   $dbname = 'pap';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
   $user=$_SESSION['userID'];
   
   
	$query = mysqli_query($conn, "SELECT * FROM utilizadores WHERE idutilizador = '$user' ") or die("Error: ".mysqli_error($conn));
	
	$ob = mysqli_fetch_object($query);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   
   echo 'Connected successfully<br>';
   
   if($_SESSION['userLevel']==1){
   $sql = " DELETE FROM alunos WHERE utilizadores_idutilizador = '$user' ";
 
  }elseif($_SESSION['userLevel']==2){
	  $sql = " DELETE FROM empresas WHERE utilizadores_idutilizador = '$user' ";
  }
  
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
   
  echo "    <meta charset='utf-8'> <script javalanguage='script' type='text/javascript'> alert('Conta desvinculada com sucesso!'); window.location.replace('../index.html');</script>";
?>