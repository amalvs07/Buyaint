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
  .header {
    background-color: #333;
    color: white;
    padding: 10px;
    display: flex;
    justify-content: center; /* Horizontally center content */
    align-items: center; /* Vertically center content */
}
a img {
    max-width: 100%;
    height: auto;
}
  </style>
</head>

<body>

<!--header start--->
  <header>
    <div class="container">
    <div class="header-top">
      
        <div class="row">
          <div class="col-md-12 text-center">
            <a href=""><img src="img\logo.png" width="21%"></a>
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
?>
<!--nav start--->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="index.php"> Shops</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="index.php">Trends</a>
        </li> -->
      
      <!-- <form class="form-inline"  action="search(1).php" method="post">

        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="name">
        <button class="btn btn-outline-dark" type="submit" style="margin-left:7px;margin-right:7px;"><img src="img/search.png"></button>
        </form>&nbsp&nbsp -->
      

        <li class="nav-item">
  <a class="nav-link" href="login.php">Login&nbsp&nbsp</a>
</li>
<li class="nav-item">
  <a class="nav-link"href="Register.php">Signup</a>
</li>
  </ul>
<?php

?>
        

    </div>
  </div>
</nav>

<!--nav end--->