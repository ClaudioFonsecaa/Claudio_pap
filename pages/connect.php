<?php
//session_start();
$error = "Unable to connect.";
$connection = mysqli_connect("127.0.0.1", "root", "rootroot") or die ($error);
mysqli_select_db($connection,"pap") or die ($error);



?>