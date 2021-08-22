<?php 
$host="localhost";
$user="root";
$password="";
$db="library";
 
 session_start();
 date_default_timezone_set('Asia/Hong_Kong');
$conn = new mysqli($host,$user,$password,$db);


$sql = "select * from toys inner join loaned using (toyid)";

$result = $conn->query($sql);




$sqlreserve = "select * from toys inner join reserved using (toyid)";

$resultreserve = $conn->query($sqlreserve);
  





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
  <a class="active" href="home.php">Home</a>
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



<!Loaned Items>
<div class="onerow">



<table align="center" style=" border-collapse: collapse; 
  width: 35%; ">



<tr style="color:white";  >
 <td>bob</td>
  <td>bob</td>
   <td>bob</td>
    <td>bob</td>
     <td>bob</td>
  </tr>



<tr>
 <th colspan="6" style="text-align:center; width: 100%; background-color: black; font-size:150%;
  color: white;
  padding: 8px;"  >
Loaned Items List
</th>
</tr>
<tr style="color:white";  >
 <td>U</td>
  <td>CAN'T</td>
   <td>SEE</td>
    <td>ME</td>
    <td>JC</td>
        <td>JC</td>
  </tr>
<tr style=" font-family: Impact, Charcoal, sans-serif; " >
  
<td>Username</td>
<td >Toy ID</td>
<td>Toy Name</td>
<td>Loan Date</td>
<td>Return DueDate</td>
<td>Return</td>
</tr>

<tr style="color:white";  >
 <td>bob</td>
  <td>bob</td>
   <td>bob</td>
    <td>bob</td>
     <td>bob</td>
      <td>bob</td>
  </tr>
<?php

while($row = $result->fetch_assoc()) {

?>

<tr>
<td>
  <?php 
  echo $row["username"]; 
  ?>
</td>

  <td>
  <?php 
  echo $row["toyid"]; 
  ?>
</td>


 <td>
  <?php 
  echo $row["toyname"]; 
  ?>
</td>

<td>
  <?php 
  echo $row["date"]; 
  ?>
</td>

<td>
  <?php 
  echo $row["loaneduntil"]; 
  ?>
</td>

<td><?php  echo "<a href='return.php?id=".$row["toyid"]."'>Return</a>";  ?></td>
 




  </tr>
<?php

}
?>

</table>







 

 


  </div>









<!Reserved Items>
<div class="onerow">



<table align="center" style=" border-collapse: collapse; 
  width: 35%; ">


<tr style="color:white";  >
 <td>bob</td>
  <td>bob</td>
   <td>bob</td>
    <td>bob</td>
     <td>bob</td>
  </tr>



<tr>
 <th colspan="6" style="text-align:center; width: 100%; background-color: black; font-size:150%;
  color: white;
  padding: 8px;"  >
Reserved Items
</th>
</tr>
<tr style="color:white";  >
 <td>U</td>
  <td>CAN'T</td>
   <td>SEE</td>
    <td>ME</td>
    <td>JC</td>
        <td>JC</td>
  </tr>
<tr style=" font-family: Impact, Charcoal, sans-serif; " >
  
<td>Username</td>
<td >Toy ID</td>
<td>Toy Name</td>
<td>PickUp DueDate</td>
<td>Reserve Date</td>
<td>Pick Up</td>
</tr>

<tr style="color:white";  >
 <td>bob</td>
  <td>bob</td>
   <td>bob</td>
    <td>bob</td>
     <td>bob</td>
      <td>bob</td>
  </tr>
<?php

while($row1 = $resultreserve->fetch_assoc()) {

?>

<tr>
<td>
  <?php 
  echo $row1["username"]; 
  ?>
</td>

  <td>
  <?php 
  echo $row1["toyid"]; 
  ?>
</td>


 <td>
  <?php 
  echo $row1["toyname"]; 
  ?>
</td>

<td>
  <?php 
  echo $row1["reserveduntildate"]; 
  ?>
</td>

<td>
  <?php 
  echo $row1["date"]; 
  ?>
</td>

<td><?php  echo "<a href='pickup.php?id=".$row1["toyid"]."'>Picked Up</a>";  ?></td>





  </tr>

<?php

}
?>

</table>







 

 


  </div>




<! social media icons:>


</body>
</html>



