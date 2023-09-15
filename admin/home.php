<?php
 include'header.php';
 SESSION_START();

if(isset($_SESSION['auth']))
{
   if($_SESSION['auth']!=1)
   {
       header("location:login.php");
   }
}
else
{
   header("location:login.php");
}
include'lib/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
    <style>
    body  {
   /* Background pattern from Toptal Subtle Patterns */
   /* height: 400px; */

    margin: 0 auto;
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    background-size: cover;
    background-image: url(./img/admin.jpg);
}
    </style>
</head>
<body>
    
    <div class="container homebody">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome To The Admin Panel</h1>
                

            </div>
        </div>
    </div>
    
</body>
</html>