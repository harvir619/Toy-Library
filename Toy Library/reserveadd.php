<?php 
$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 date_default_timezone_set('Asia/Hong_Kong');
$conn = new mysqli($host,$user,$password,$db);
$myDate = date('Y/m/d');



if ('0' ==$_SESSION["loggedinusername"]){


$message = "Please Log in first to reserve an item." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=login.php" );
	

}

else {

/* for if alreasy loaned  */



$bobby= "select loaneduntil from loaned where toyid ='".$_SESSION["id"]."'";


$result = $conn->query($bobby);



while($row = $result->fetch_assoc()) {

 $loaneduntildate = $row["loaneduntil"];

$reserveduntildate = $loaneduntildate;
$date=date_create($reserveduntildate);
date_add($date,date_interval_create_from_date_string("4 days"));

$date3 = $date	->format('Y-m-d H:i:s');

$date1=date_create($reserveduntildate);
date_add($date1,date_interval_create_from_date_string("1 days"));

$date4 = $date1	->format('Y-m-d H:i:s');




 
$sql="INSERT INTO reserved (username,toyid,date,reserveduntildate)

	   VALUES('" . $_SESSION['loggedinusername'] . "',  '" . $_SESSION['id'] . "','".$date4."','".$date3."')";
	

}




	
  
    if ($conn->query($sql) === TRUE) {
  	
	
			$message = "Item has been reserved. Please check the pick up date." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=myaccount.php" ); 
} 

 

 




}















?>