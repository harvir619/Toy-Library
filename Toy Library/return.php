<?php

 $toyid = $_GET['id'];

$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
date_default_timezone_set('Asia/Hong_Kong');

$conn = new mysqli($host,$user,$password,$db);
	
$sqlreturn = "DELETE FROM `loaned` WHERE toyid= $toyid";

$sqlupdatestatus = "UPDATE toys SET status = 1 WHERE toyid = $toyid";

 if ($conn->query($sqlreturn) === TRUE) {

    
  if($conn->query($sqlupdatestatus) === TRUE) {



$sqlreserve2="SELECT reserved.toyid FROM reserved LEFT JOIN loaned ON loaned.toyid = reserved.toyid WHERE loaned.toyid IS NULL"; 

$result1 = $conn->query($sqlreserve2);

while($rowcheckreserve = $result1->fetch_assoc()) {


$sqlupdate = "UPDATE toys SET status = 3 WHERE toyid = '".$rowcheckreserve['toyid']."'";

 if ($conn->query($sqlupdate) === TRUE) {	 }


}

    		header("Location: staffaccount.php"); 
}}

?>