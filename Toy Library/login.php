  
<?php 
 
$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 
$conn = new mysqli($host,$user,$password,$db);
 
 
 
if(isset($_POST['username'])){
    
    $uname=strtolower($_POST['username']);
    $password=strtolower($_POST['password']); 
    
    $sql="select * from user where username='".$uname."'AND password='".$password."' limit 1";
    
    $result=$conn->query($sql);
    
    if($result->num_rows > 0){
      

		$_SESSION["status"]=1;
		 $_SESSION["loggedinusername"]=$uname;

	header("Location: home.php"); 
        exit();
    }
    else{
       
      $message = "You have entered incorrect password. Please try again." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=login.php" ); 
} 
        exit();
    
        
}
?>



















<!DOCTYPE html>
<html>
<head>



<link href="login.css" rel="stylesheet">
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
<button  onclick="window.location.href = 'registration.php';" style = "font-size: 20px;" >  <a href="registration.php" <?php echo 
($_SESSION['status'] == 1) ? 'style="display:none;"' : '' ?> >SignUp</a> </button>
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
 <form action="action.php"  method="POST" >
      <input type="text" placeholder="Search.." name="search" required>
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
</div>





<! Usman form>
<form id="harvir" action = "#" method="POST1">
<input type = "text" name = "username" style="display:none;" value="usman">
</form>





<! login credentials>


<div class="onecolumn" align="center" style="font-family:Impact, Charcoal, sans-serif;">
<div class="card">

<h2> Login Here </h2>

<form action = "#" method="POST">
<table>
<tr>
<td>Username:</td>
<td>
<input type = "text" name = "username" required>
</td>
</tr>
<tr>
<td>Password:</td>
<td>
<input type ="password" name = "password" required>
 </td>
 </tr>
 <tr>
 <td>
 </td>
 <td align="center" >
 <input type = "submit"  STYLE="  background-color: black;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  width:50%;
box-shadow: 5px 5px ;
" name ="submit"
  value = "Login"  
  class="btn-login"/>

 </td>
 </tr>

 <tr>
 <td><td> Not yet a Member?<a href="registration.php">Register</a>
 </td></td>
 </tr>
 </table>

</form>

</div>
</div>









<! social media icons:>

<div style = "position: absolute; "class = "bottomsocial">
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







