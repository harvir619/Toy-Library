
<?php 
session_start();

date_default_timezone_set('Asia/Hong_Kong');

 $_SESSION['status'] =0;
  $_SESSION['loggedinusername'] =0;

$host="localhost";
$user="root";
$password="";
$db="library";
 

 
$conn = new mysqli($host,$user,$password,$db);
$myDate = new DateTime(date("Y-m-d"));
$myDate = $myDate->format('Y/m/d');


$sqlrenewstauts = "UPDATE toys SET status = 1";

 if ($conn->query($sqlrenewstauts) === TRUE) {	 }



$sqldelete = "DELETE FROM loaned WHERE loaneduntil <= '".$myDate."'";


 if ($conn->query($sqldelete) === TRUE){}
 




$date=date_create($myDate);
date_add($date,date_interval_create_from_date_string("-1 days"));
$date3 = $date	->format('Y-m-d');



$sqlreserve = "DELETE FROM reserved WHERE reserveduntildate <= '".$date3."'";

 if ($conn->query($sqlreserve) === TRUE) {}




$setstatusofloan ="UPDATE toys, loaned SET toys.status = 2 WHERE toys.toyid = loaned.toyid";

 if ($conn->query($setstatusofloan) === TRUE) {}






 /* When the loan item returns , the status cahnge to reserve */
$sqlreserve2="SELECT reserved.toyid FROM reserved LEFT JOIN loaned ON loaned.toyid = reserved.toyid WHERE loaned.toyid IS NULL"; 

$result1 = $conn->query($sqlreserve2);

while($rowcheckreserve = $result1->fetch_assoc()) {


$sqlupdate = "UPDATE toys SET status = 3 WHERE toyid = '".$rowcheckreserve['toyid']."'";

 if ($conn->query($sqlupdate) === TRUE) {	 }

}



 

header("Location: home.php");


?>