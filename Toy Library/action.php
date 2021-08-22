
<?php


$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 date_default_timezone_set('Asia/Hong_Kong');
$conn = new mysqli($host,$user,$password,$db);



if ($_POST['search'] == ""){ header("Location:home.php");}


else {
$sqlsearch = "SELECT toyid from toys where toyname LIKE '%".$_POST['search']."%' OR  toyid LIKE '%".$_POST['search']."%' LIMIT 1";




$search_query= $conn->query($sqlsearch);	
	

	 if($search_query->num_rows == 0){

	$message = "No search result found. Please check out our collection page to see what you are looking for. " ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=collection.php" );
	 }


while($row = $search_query->fetch_assoc()) {


$_SESSION['itemsearchid'] = $row["toyid"]; 
header("Location:searchitem.php");

}}

?>