<?php 
$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 
$conn = new mysqli($host,$user,$password,$db);
$reserveduntildate=new DateTime();
$reserveduntildate->modify("+3 day");
$reserveduntildate ->format("Y-m-d");
 echo $reserveduntildate ;
?>