<?php 
$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 date_default_timezone_set('Asia/Hong_Kong');
$conn = new mysqli($host,$user,$password,$db);

 $toyid = $_GET['id'];

$sqldelete = "DELETE FROM `reserved` WHERE toyid = $toyid";

if ($conn->query($sqldelete) === TRUE) { header("Location: myaccount.php"); 	 }





?>