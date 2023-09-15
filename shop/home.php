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

</head>
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
    background-image: url(./img/wall.jpg);
}
    </style>
<body >
    <?php
    if (isset($_SESSION['SHOPID'])) {
        $id=$_SESSION['SHOPID'];
        $loginquery="SELECT shopname  FROM shops WHERE shop_id='$id' ";
        $loginres = $conn->query($loginquery);

      // echo $loginres->num_rows;

        if ($loginres->num_rows > 0) 
        {

            while ($result=$loginres->fetch_assoc()) 
            {
                $username=$result['shopname'];
            }
        }
    }
    ?>
    <div class="container homebody">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-transform: uppercase;">Welcome To The <?php echo $username ?> Panel</h1>
                

            </div>
        </div>
    </div>
    
</body>
</html>