<?php 
session_start();
$_SESSION['status'] =0;
$_SESSION['loggedinusername'] ='0';
header("Location:home.php");  
 ?>