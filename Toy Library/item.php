<?php 
$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 date_default_timezone_set('Asia/Hong_Kong');
$conn = new mysqli($host,$user,$password,$db);
 $toyid = $_GET['id'];
 $_SESSION['id'] = $toyid;
$_SESSION["ifloan"]=0;


?>

<!DOCTYPE html>
<html>
<head>
<link href="item.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>
<body>

<div class="header">
<div class="Row">



    <div class="Column0">

</div>


    <div class="Column">
<button onclick="window.location.href = 'home.php';"> <img src="logo.jpg"/>
<h1>Hong Kong Toy Library</h1>
 </button>
</div>

 
      <div class="Column1">
<img src="profile.png"  width="30" height="30">

<button  onclick="window.location.href = 'login.php';" style = "font-size: 20px;" >  <u><b> <a href="login.php" <?php echo 
($_SESSION['status'] == 1) ? 'style="display:none;"' : '' ?> >Login</a></b><u> </button>

<button  onclick="window.location.href = 'myaccount.php';" style = "font-size: 20px;" >  <u><b> <a href="myaccount.php" <?php echo 
($_SESSION['status'] == 0) ? 'style="display:none;"' : '' ?> >My Account</a></b><u> </button>
<b style = "color:black;">/ </b>

<button  onclick="window.location.href = 'registration.php';" style = "font-size: 20px;" >  <u><b> <a href="registration.php" <?php echo 
($_SESSION['status'] == 1) ? 'style="display:none;"' : '' ?> >SignUp</a></b><u> </button>

<button  onclick="window.location.href = 'decision.php'; " style = "font-size: 20px;" >  <a href="decision.php" <?php echo 
($_SESSION['status'] == 0) ? 'style="display:none;"' : '' ?> >Logout</a> </button>
 <p  <?php echo 
($_SESSION['status'] == 0) ? 'style="display:none;"' : '' ?> style="color:black; font-family: Impact, Charcoal, sans-serif;"> Welcome, <?php echo$_SESSION["loggedinusername"]; ?></p>
</div>
</div>
</div>


  <! NAVIGATION BAR: >
<div class="row">
<div class="topnav">
  <a  href="home.php">Home</a>
  <a  class="active" href="collection.php" >  Collections</a>
<a href="about.php" >About</a>
  
<div class="search-container"> 
 <form action="action.php"  method="POST">
      <input type="text" placeholder="Search.." name="search" required>
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
</div>


<! Search Bar: >

<div class="onerow">
<div class="twocolumn">

<img src="<?php echo $toyid; ?>.jpg" width=100%; height=100%;>


</div>

<div class="twocolumn">
<p  style="font-family:Impact, Charcoal, sans-serif; font-size:30px;"> Toy 


<?php


$sql= "select *from toys where toyid ='".$toyid."'";

$result = $conn->query($sql);


while($row = $result->fetch_assoc()) {
echo"Name:  ".$row["toyname"] . "<br>";
echo" Toy ID:  ". $toyid. "<br>";
echo" Status: ";

 $_SESSION['id'] = $toyid;


/* Comment likh de ya pr ki make sql to get status and check everything about if loan in other pages and everythign else should be okay saleh wait kr bhosdike, theek hai kl bnalu ga , ahh kal deadline hai yr do you understand the  */


	  if($row["status"] == 1){
  echo"Availible";

  $_SESSION["ifloan"]=1;

  }
  
  if($row["status"] == 2){
  echo"Loaned";
   $_SESSION["ifloan"]=2;

  }
  
  if($row["status"] == 3){
  echo"Reserved";
  
   $_SESSION["ifloan"]=3;

  }
	
	}
	
?>
<br></br>





<button  <?php if ($_SESSION["ifloan"] == 2 || $_SESSION["ifloan"] == 3) { ?> disabled style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color:#e9e9e9; color:white; padding:5;"  <?php   } ?> onclick="window.location.href = 'loanadd.php';" style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color: #2196F3; color:white; padding:5;">  


Loan

 </a></button>



<button  

<?php 

$conn = new mysqli($host,$user,$password,$db);

$sqlcheckreserve= "select * from reserved where toyid ='".$_SESSION["id"]."' ";


if ($_SESSION["ifloan"] == 3 || $_SESSION["ifloan"] == 1){ ?> disabled style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color:#e9e9e9; color:white; padding:5;"  <?php   } 

/* to disable the if the person have already loaned */

$sqlcheckloan="select * from loaned 
where toyid ='".$_SESSION["id"]."' AND username='".$_SESSION["loggedinusername"]."' limit 1";

$check = $conn->query($sqlcheckloan);
$check2 = $conn->query($sqlcheckreserve);

if($check2->num_rows == 1){

 { ?> disabled style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color:#e9e9e9; color:white; padding:5;"  <?php    }
}


else if($check->num_rows == 1)

  { ?> disabled style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color:#e9e9e9; color:white; padding:5;"  <?php    }


?> 


onclick="window.location.href = 'reserveadd.php';" style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color: #2196F3; color:white; padding:5;">  


Reserve

 </a></button>	




<button  

<?php 

$conn = new mysqli($host,$user,$password,$db);


if ($_SESSION["ifloan"] == 3 || $_SESSION["ifloan"] == 1){ ?> disabled style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color:white; color:white; padding:5;"  <?php   } 

/* to disable the if the person have already loaned */
$sqlcheckloan="select * from loaned 
where toyid ='".$_SESSION["id"]."' AND username='".$_SESSION["loggedinusername"]."' limit 1";

$check = $conn->query($sqlcheckloan);

if($check->num_rows == 1){

$myDate = new DateTime(date("Y-m-d H:i:s"));


while($row = $check->fetch_assoc()) {





$date1=date_create($row["loaneduntil"]);
date_add($date1,date_interval_create_from_date_string("0 days"));



$nbDays = ($myDate)->diff($date1);

$days = $nbDays->format("%a");









 if($days >= 0 && $days < 2 ){


}

else{

   ?> disabled style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color:white; color:white; padding:5;"  <?php  } } }

else{
   ?> disabled style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color:white; color:white; padding:5;"  <?php
}

?> 






onclick="window.location.href = 'renew.php';" style="font-family:Impact, Charcoal, sans-serif; font-size:30px;  background-color: #2196F3; color:white; padding:5;">  


Renew
 </a></button>  


<br></br>
<button onclick="window.location.href = 'collection.php';" style="font-family:Impact, Charcoal, sans-serif; font-size:30px; width:100%; background-color:black; color:white; padding:5;"> <-GO   Back </button>


</p>




</div>
</div>



<! social media icons:>

<div   class = "bottomsocial">
<div class = "iconcontainer">
<button onclick="window.location.href = 'https://www.instagram.com';" > <img src="ig.jpeg" alt="profile" width="30" height="30"><button>
<button onclick="window.location.href = 'https://www.facebook.com';"> <img src="fb.jpeg" alt="profile" width="30" height="30"><button>
<button onclick="window.location.href = 'https://www.youtube.com';"> <img src="yt.jpeg" alt="profile" width="30" height="30"><button>
<button onclick="window.location.href = 'https://www.twitter.com';"> <img src="tw.jpeg" alt="profile" width="30" height="30"><button>
</div>


<div class = "iconcontainer">
<button onclick="window.location.href = 'contact.php';" >Contact Us<button>
<b style = "color:black;">| </b>
<button onclick="window.location.href = 'faq.php';" >FAQ<button>
<b style = "color:black;">| </b>
<button onclick="window.location.href = 'sitemap.php';" >SiteMap<button>
</div>

</div>

</body>
</html>



