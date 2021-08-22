
<?php 

$host="localhost";
$user="root";
$password="";
$db="library";

 session_start();
 date_default_timezone_set('Asia/Hong_Kong');
$conn = new mysqli($host,$user,$password,$db);
$myDate = date('Y/m/d');
 
$sqlcheckhowmanyloaned=  "select * from loaned where username = '" . $_SESSION['loggedinusername'] . "' "; 
$howmanyloaned = $conn->query($sqlcheckhowmanyloaned);

	 if($howmanyloaned->num_rows == 3){
$message = "You have already borrowed maximum amount of Toys allowed which is 3 per user. Please return at least one, to borrow again. Thank you." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=collection.php" );
	
}	

	 


else{

if ('0' ==$_SESSION["loggedinusername"]){


$message = "Please Log in first to loan an item." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=login.php" );
	

}

else{

$sql="INSERT INTO loaned(username,toyid,date,loaneduntil,term,status)
	   VALUES('" . $_SESSION['loggedinusername'] . "',  '" . $_SESSION['id'] . "','".$myDate."','".date('Y-m-d H:i:s', strtotime("+7 day"))."','0','2')";
	 
$tati=$_SESSION['id'];


 $sql1="UPDATE toys SET status = 2 WHERE toyid = $tati";
   


    if ($conn->query($sql) === TRUE) {

    
  	
			$message = "Item has been loaned. Please check the return date." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=myaccount.php" ); 

}


  if ($conn->query($sql1) === TRUE) {

    	
}

}}
 

?>