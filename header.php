<!DOCTYPE html>
<html>
<head>
	<title>Buyaint</title>
	<meta charset="UTF-8">
    <meta name="description" content="test">
    <meta name="keywords" content="HTML, CSS, BOOTSTRAP">
    <meta name="author" content="Anik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <!--font-family: 'Raleway', sans-serif;-->
    <link rel="favicon" type="text/css" href="#favicon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
<style>
  #idd{
    padding-right: 30px;
  font-family: "Raleway", sans-serif;
  text-transform: uppercase;
  color: rgb(0, 0, 0);
  }
  </style>

</head>

<body>

<!--header start--->
  <header>
    <div class="container">
    <div class="header-top">
      
        <div class="row">
          <div class="col-md-12 text-center" >
            <a href=""><img src="img/logo.png" width="21%"></a>
          </div>
        </div>
    
    </div>
    </div>
  </header>
  <div class="line">

    
  </div>
<!--header end--->
<?php 
  SESSION_START();
  include "lib/connection.php";
  $id=$_SESSION['userid'];
 $sql = "SELECT * FROM cart where userid='$id'";
 $result = $conn -> query ($sql);
?>
<!--nav start--->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent"style="text-transform: uppercase;">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="Clothing.php"> Shops</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Trends.php">Trends</a>
        </li> -->
      </ul>
     
        <?php
          $total=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $total++;
            }
          }
              ?>
        <a href="cart.php" class="nav-link" id="idd"><img src="img/cart.png"><?php echo $total?></a>&nbsp;&nbsp;
        <?php 

if(isset($_SESSION['auth']))
{
   if($_SESSION['auth']==1)
   {
    echo $_SESSION['username']; ?>
    <a href="profile.php" class="nav-link" id="idd">My Orders</a>
  
    <a href="logout.php" class="nav-link" id="idd">logout</a>
<?php
   }
}
else
{
?>
  <a href="login.php">Login</a>
  <a href="Register.php">Signup</a>
  
<?php
}
?>
        

    </div>
  </div>
</nav>

<!--nav end--->