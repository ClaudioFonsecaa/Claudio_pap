<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="../img/favicon.ico" >
		<link rel="stylesheet" href="../css/style.css">  
		
	</head>
	<body>

	
	<style>
	
	
	/* unvisited link */
a:link {
    color: green;
}

/* visited link */
a:visited {
    color: green;
}

/* mouse over link */
a:hover {
    color: black;
}

/* selected link */
a:active {
    color: yellow;
} 
	
	
	
.dropdown {
    position: relative;
    display: inline-block;
	z-index: 1;
    
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 20px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
	z-index: 1;
}

.desc {
    padding: 15px;
    text-align: center;
	z-index: 1;
}


img{
border-radius:50%;
}


.parent {
  position: relative;
  top: 0;
  left: 0;
}
.image1 {
  position: relative;
  
}
.image2 {
  position: absolute;
  top: 85px;
  left: 80px;
}
.image3 {
  position: absolute;
  top: 50px;
  left: 470px;
}

.icon {
        width:30px; 
        height:30px;
    }
    .txt {
        padding:-10px 0 0 10px;
        background:red; 
        font-size:xx-small;
    }

</style>

	<div id="info">
	<?php echo "Bem-vindo " . $_SESSION["user"] ."<br>";
	$img_loc = "nada";
	
	?>
	
	
	<?php 
	
	
	$result = mysqli_query($connection, "select * from notifications");
	//$tableExists = mysqli_num_rows($result) > 0;
	//echo $tableExits;
	
	
		if (mysqli_num_rows($result) > 0 && $_SESSION['userLevel']==3){
		
					echo "
					<a href='notificacao.php'> 
								<img src='../img/notify2_icon.png' alt='notificacao2' width='100' height='100'>
					</a>
					";
					
		}else{	
					echo "	
					<a href='notificacao.php'> 
					<img src='../img/notify_icon.png' alt='notificacao1' width='100' height='100'>
					</a>
					";
		}
		
	
	?>			
				
				
				
	
	<?php
	
	if($_SESSION['userLevel']==2){	 //---------------------------------------------empresa dropdown
	
	$q = mysqli_query($connection,"SELECT * FROM empresas WHERE utilizadores_idutilizador = '".$_SESSION['userID']."'");
                        while($row = mysqli_fetch_assoc($q)){               
                                if($row['imagem'] == ""){
                                        
										$img_loc = "../img/default_avatar.png";
										
                                } else {
									
										$img_loc = "../utilizadores/".$_SESSION['user']."/pictures/".$row['imagem']."";
										
                                } 
								echo "
										<div class='dropdown'>
										<div class='parent'>
										<img class='image1' src='$img_loc' alt='profile_img' width='100' height='100'>
										<img  class='image2' src='../img/arrow_down.png' alt='profile_img'>
										</div>
										<div class='dropdown-content'>
										<div class='desc'>
										<a href='inicio.php' style='text-decoration:none'>Propostas</br></br></a>
										<a href='estatisticas.php' style='text-decoration:none'>Estatísticas</br></br></a>
										<a href='alunos.php' style='text-decoration:none'>Alunos</br></br></a>
										<a href='perfil.php' style='text-decoration:none'>Perfil</br></br></a>
										<a href='logout.php' style='text-decoration:none'>Sair</br></a>
										</div>
										</div>
										</div>
								";
										
								echo "<br>";					
                        }
	
	}elseif($_SESSION['userLevel']==1){		 //---------------------------------------------aluno dropdown
	
	
                       $q = mysqli_query($connection,"SELECT * FROM alunos WHERE utilizadores_idutilizador = '".$_SESSION['userID']."'");
                        while($row = mysqli_fetch_assoc($q)){               
                                if($row['imagem'] == ""){
                                        
										$img_loc = "../img/default_avatar.png";
										
                                } else {
									
										$img_loc = "../utilizadores/".$_SESSION['user']."/pictures/".$row['imagem']."";
										
                                } 
								
								echo "
										<div class='dropdown'>
										<div class='parent'>
										<img class='image1' src='$img_loc' alt='profile_img' width='100' height='100'>
										<img  class='image2' src='../img/arrow_down.png' alt='profile_img'>
										</div>
										<div class='dropdown-content'>
										<div class='desc'>
										<a href='inicio.php' style='text-decoration:none'>Propostas</br></br></a>
										<a href='estatisticas.php' style='text-decoration:none'>Estatísticas</br></br></a>
										<a href='perfil.php' style='text-decoration:none'>Perfil</br></br></a>
										<a href='logout.php' style='text-decoration:none'>Sair</br></a>
										</div>
										</div>
										</div>
								";
										
								echo "<br>";					
                        }
	}else{
		
		 //---------------------------------------------admin dropdown
									
										echo "
										
										<div class='dropdown'>
										<div class='parent'>
										<img  class='image1' src='../img/admin.png' alt='profile_img' width='100' height='100'>
										<img  class='image2' src='../img/arrow_down.png' alt='profile_img'>
										</div>
										<div class='dropdown-content'>
										<div class='desc'>
										<a href='inicio.php'  style='text-decoration:none'>Propostas</br></br></a>
										<a href='estatisticas.php' style='text-decoration:none'>Estatísticas</br></br></a>
										<a href='alunos.php' style='text-decoration:none'>Alunos</br></br></a>
										<a href='empresas.php' style='text-decoration:none'>Empresas</br></br></a>
										<a href='logout.php' style='text-decoration:none'>Sair</br></a>
										</div>
										</div>
										</div>
										";
		
	}
	
     ?>
	 </div>
	
	</body>
</head>



</html>