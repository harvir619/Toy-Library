<?php

 $toyid = $_GET['id'];
date_default_timezone_set('Asia/Hong_Kong');
$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
$myDate = new DateTime(date("Y-m-d"));
$myDate2 = new DateTime(date("Y-m-d"));
$conn = new mysqli($host,$user,$password,$db);
	
$sqlcheckpickupdate= "Select * from reserved where toyid = $toyid";
$resultsqlciu = $conn->query($sqlcheckpickupdate);

$sqlcheckreturn= "Select * from loaned where toyid = $toyid";
$resultcheckreturn = $conn->query($sqlcheckreturn);

$myDate3 = date('Y/m/d');






	 if($resultcheckreturn->num_rows == 0){



	$sqlloan="INSERT INTO loaned(username,toyid,date,loaneduntil,term,status)
	   VALUES('" . $_SESSION['loggedinusername'] . "',  '" .$toyid. "','".$myDate3."','".date('Y-m-d H:i:s', strtotime("+7 day"))."','0','2')";


	$sqldeletereserverecord="DELETE FROM `reserved` WHERE toyid=$toyid";


$sqlcheckuser="SELECT username From reserved WHERE toyid=$toyid LIMIT 1";
$resultcheckuser = $conn->query($sqlcheckuser);

while($rowcheckuser = $resultcheckuser->fetch_assoc()) {

$checkuser= $rowcheckuser['username'];



$sqlcheckhowmanyloaned=  "select * from loaned where username = '" .$checkuser. "' "; 
$howmanyloaned = $conn->query($sqlcheckhowmanyloaned);

	 if($howmanyloaned->num_rows == 3){
$message = "This user has already borrowed 3 items. Need to return atleast one first." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=staffaccount.php" );
	
}	


    else if ($conn->query($sqlloan) === TRUE) {
$sqlupdate = "UPDATE toys SET status = 2 WHERE toyid = $toyid";
    if ($conn->query($sqlupdate) === TRUE) {}
  if($conn->query($sqldeletereserverecord) === TRUE) {

    		header("Location: staffaccount.php"); 
}
  	
}

}

}






	 
else{


while($rowcheckpickupdate = $resultsqlciu->fetch_assoc()) {



$date1=date_create($rowcheckpickupdate["date"]);
date_add($date1,date_interval_create_from_date_string("0 days"));



$nbDays = ($myDate)->diff($date1);
$nbDays->invert; 
$days = (int)$nbDays->format("%r%a");



}


 if($days >= 0){
$message = "This toy is still loaned, it cannot be picked up." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=staffaccount.php" );
	

}




else{


$myDate3 = date('Y/m/d');

	$sqlloan="INSERT INTO loaned(username,toyid,date,loaneduntil,term,status)
	   VALUES('" . $_SESSION['loggedinusername'] . "',  '" .$toyid. "','".$myDate3."','".date('Y-m-d H:i:s', strtotime("+7 day"))."','0','2')";


	$sqldeletereserverecord="DELETE FROM `reserved` WHERE toyid=$toyid";


$sqlcheckuser="SELECT username From reserved WHERE toyid=$toyid LIMIT 1";
$resultcheckuser = $conn->query($sqlcheckuser);

while($rowcheckuser = $resultcheckuser->fetch_assoc()) {

$checkuser= $rowcheckuser['username'];



$sqlcheckhowmanyloaned=  "select * from loaned where username = '" .$checkuser. "' "; 
$howmanyloaned = $conn->query($sqlcheckhowmanyloaned);

	 if($howmanyloaned->num_rows == 3){
$message = "This user has already borrowed 3 items. Need to return atleast one first." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=staffaccount.php" );
	
}	


    else if ($conn->query($sqlloan) === TRUE) {

$sqlupdate = "UPDATE toys SET status = 2 WHERE toyid = $toyid";

if ($conn->query($sqlupdate) === TRUE) {}
    
  if($conn->query($sqldeletereserverecord) === TRUE) {

    		header("Location: staffaccount.php"); 
}
  	
}

}

}
}


?>