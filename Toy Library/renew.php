<?php


$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 date_default_timezone_set('Asia/Hong_Kong');
$conn = new mysqli($host,$user,$password,$db);
	
	


$sql= "select * from loaned where toyid ='".$_SESSION["id"]."'";
$sqlcheckreserve= "select * from reserved where toyid ='".$_SESSION["id"]."'";



$result = $conn->query($sql);
$result2 = $conn->query($sqlcheckreserve);
$tati=$_SESSION['id'];


if($result2->num_rows ==0){







while($row = $result->fetch_assoc()) {

if($row["term"] == "3"){

 
$message = "You have already renewed this item 3 times, you cannot renew any further. Please choose another item." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=collection.php" );
	
}


else{

$bob=(int)$row["term"];
$termactual=$bob+1;

 $loaneduntildate = $row["loaneduntil"];

$reserveduntildate = $loaneduntildate;
$date=date_create($reserveduntildate);
date_add($date,date_interval_create_from_date_string("7 days"));

$date3 = $date	->format('Y-m-d H:i:s');


 $sql1="UPDATE loaned SET loaneduntil = '".$date3."' WHERE toyid = $tati";
  $sql2="UPDATE loaned SET term = '".$termactual."' WHERE toyid = $tati";
 
if ($conn->query($sql1) === TRUE) {
 
   	
}

if ($conn->query($sql2) === TRUE) {

 	$message = "Your item has been renewed. Please check the new return date." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=myaccount.php" ); 
}

}

}


}

else { 
$message = "This toy has already been reserved by another user, you cannot renew this toy. Please choose another item." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=collection.php" );
	

}







?>