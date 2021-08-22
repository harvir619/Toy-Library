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






<! My Account System:>

</u></u></u>


<div style="text-align: center;">
<h1 > FAQs </h1>

<h2> Q1. How to search for toys? </h2>

<p>You may search our toy library catalogue for an item by toy name or toy id</p>



<h2> Q2. How many books can I borrow from the HKTL, and for how long? </h2>

<p> 


 Every user can borrow a toy for 7 days and can renew it up to three times if no other user has made a reserve request. <br> 
 Users are required to return all loan items by the due date. <br>
 A user can reserve an already loaned toy from its expexted return date.<br>
 If a toy is returned before its expexted date its status will change to availible <br>
 However if it is reserved by another user it will remain reserved until the reserved date.

 </p>

 <h2> Q3. When can I renew my loaned toy? </h2>

 <p> 


The renew option will enable after 5 days in your loan period so that other users have equal chance of getting the same toy. <br>
However even after 5 days a toy can not be renewed if some other user has already reserved that toy. 

 </p>

 <h2> Q4. Can I reserve a toy? </h2>

 <p> 


Yes, you are more than welcome to use our reservation service.<br>
If the status of the requested item is “Unavailable”, just log-in our website, <br>
then simply click the “Reserve” button in the page showing the search results. <br>
We will inform you by email when the item is available.

 </p>


  <h2> Q5. When do I have to collect the toy if the toy is available? </h2>

 <p> 


If user not collected by the requested user within three days,<br>
 the reservation will be cancelled and the status of a reserved toy<br>
  will be changed to “Available for loan” for other users.


 </p>




</div>

<! social media icons:>

<div class = "bottomsocial" >
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



