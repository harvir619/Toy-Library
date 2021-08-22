
<?php
 session_start();
if(isset($_POST['username'])){

$username = strtolower($_POST['username']);
$password = strtolower($_POST['password']);
$phone = $_POST['phone'];
$email = strtolower($_POST['mail']);
$gender = $_POST['gender'];



	
 	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "library";
    
	//create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     
	 
$query="select * from user where username='".$username."' limit 1";
	 
	   $result=$conn->query($query);
	
	 if($result->num_rows == 0){
	 
	   $sql="INSERT INTO user(username,password,number,email,gender)
	   VALUES('$username',  '$password','$phone','$email','$gender')";
	 
	
  
    if ($conn->query($sql) === TRUE) {
  	$_SESSION["status"]=1;
    $_SESSION["loggedinusername"]=$username;
	header("Location: home.php"); 
}} 
else {
	
      $message = "This username has already been taken. Please choose another one." ;

echo "<script type='text/javascript'>alert('$message');</script>";
header( "refresh:0; url=myaccount.php" ); 
 
	 }
   
    }
}
?>






<!DOCTYPE php>
<php>
<head>
<link href="registration.css" rel="stylesheet">
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
<button  onclick="window.location.href = 'login.php';" style = "font-size: 20px;" >  <a href="login.php" <?php echo 
($_SESSION['status'] == 1) ? 'style="display:none;"' : '' ?> >Login</a> </button>
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
 <form action="action.php"  method="POST" >
      <input type="text" placeholder="Search.." name="search" required>
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
</div>





<! signup credentials>


<div class="onecolumn" align="center" style="font-family:Impact, Charcoal, sans-serif;">
<div class="card">

<h2> Create a New Account </h2>

<form action="" method="POST">
<table>
  <tr>
      <td >Username:</td>
    <td style="text-align:center;">
      <input type ="text" name="username" placeholder="Username must be unique" required>
    </td>
  </tr>
  <tr>
    <td >Password:</td>

    <td style="text-align:center;"> 
      <input type="Password" name="password" placeholder="Enter Password Here" required>
    </td>
  </tr>
  <tr>
    <td >Email:</td>
    <td style="text-align:center;">
      <input type="email" name= "mail" placeholder="Enter email here" required>
    </td>
  </tr>
  <tr>
    <td >
      Gender:
    </td>
    <td style="text-align:center;">
      <input type="radio" name ="gender" value = "M" style="margin: 0 10px 0 10px;" >Male
      <input type="radio" name ="gender" value = "F" style="margin: 0 10px 0 10px;">Female
      <input type="radio" name ="gender" value = "O" style="margin: 0 10px 0 10px;">Others
    </td>
  </tr>
  <tr>
    <td >Phone:</td>
    <td style="text-align:center;">
      

      
      
      
      
      <input type ="tel" name ="phone" pattern="[0-9]{8}" required placeholder="8 digits required";>
    </td>
    <tr>
      <td>
        </td>
        <td style="text-align:center;">
        <input type ="submit" name="submit"
        STYLE="  background-color: black;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  width:50%;
box-shadow: 5px 5px ;"
        value="CreateAccount" >
      </td>
    </tr>


    </tr>
  </tr>
</table>


</form>

</div>
</div>









<! social media icons:>

<div  class = "bottomsocial">
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

