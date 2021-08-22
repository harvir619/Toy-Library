<?php 
$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 date_default_timezone_set('Asia/Hong_Kong');
$conn = new mysqli($host,$user,$password,$db);

$sql = "select * from toys";
	
$result = $conn->query($sql);	

$bob=0;

?>

<!DOCTYPE html>
<html>
<head>
<link href="collection.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">



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

</u></u></u>






<! Items Begin: >


<table align="center" style=" border-collapse: collapse; 
  width: 100%; ">


<tr colspan="8">
<td  style="color:white;">U CAN'T SEE ME</td>
</tr>
<?php

while($row = $result->fetch_assoc()) {

?>

<td style=" color:white;">BOB</td>
  <td  colspan="1" style="  color:black; font-family: Impact, Charcoal, sans-serif; font-size:15px; text-align: center;">
  <?php 
  echo "Toy ID: ";
  echo $row["toyid"]; 
  echo "<br></br>";
  ?>




  <?php 

  echo $row["toyname"]; 
  echo "<br></br>";
  ?>



  <?php 

if($row["status"] == "2" ){ echo "Loaned";}
else if($row["status"] == "3" ){ echo "Reserved";}
else { echo "Available";}
  echo "<br></br>";
  $bob++;
  ?>

<?php  echo "<a href='item.php?id=".$row["toyid"]."'>More Info>></a>";  ?>

</td>

<td  colspan="1">



<img src="<?php   echo $row["img_dir"];  ?>" width=100%; height=25%;  >


 </td>


<?php

if($bob == 4 ){  ?>
<td style=" color:white;">BOB</td>

 <tr></tr> <?php  $bob = 0; }


}


?>

<tr colspan="8">
<td  style="color:white;">U CAN'T SEE ME</td>
</tr>

</table>


















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



