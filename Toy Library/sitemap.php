<?php 
$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 date_default_timezone_set('Asia/Hong_Kong');
$conn = new mysqli($host,$user,$password,$db);






?>



<!DOCTYPE html>
<html>
<head>
<link href="myaccount.css" rel="stylesheet">
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
  <a href="collection.php"> Collections</a>

<a href="about.php" >About</a>

<div class="search-container"> 
 <form action="action.php"  method="POST">
      <input type="text" placeholder="Search.." name="search" required>
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>


</div>
</div>

</u></u></u>







<table>
<h1> Site Map </h1>

<tr>
<td>
Content
</td>
</tr>


<tr>
<td>
<a href= "home.php">Home</a>
</td>
</tr>

<tr>
<td>
<a href= "collection.php"> Collection  </a>
</td>
</tr>

<tr>
<td style="color: white">
bob
</td>
</tr>



<tr>
<td>
User Accounts
</td>
</tr>


<tr>
<td>
<a href= "login.php"> Login  </a>
</td>
</tr>

<tr>
<td>
<a href= "registration.php"> Registration  </a>
</td>
</tr>

<tr>
<td style="color: white">
bob
</td>
</tr>



<tr>
<td>
Information
</td>
</tr>


<tr>
<td>
<a href= "about.php"> About  </a>
</td>
</tr>


<tr>
<td>
<a href= "faq.php"> FAQ  </a>
</td>
</tr>

<tr>
<td>
<a href= "contact.php"> Contact  </a>
</td>
</tr>


<tr>
<td>
<a href= "Sitemap.php"> SiteMap  </a>
</td>
</tr>



</table>



<! social media icons:>

<div class = "bottomsocial" style="position:absolute;">
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



