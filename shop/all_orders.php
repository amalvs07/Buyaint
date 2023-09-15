<?php
 include'header.php';
 
 session_start();
 
 if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
     header("location: login.php");
     exit(); // Add exit() to stop executing after redirection
 }
 
 if (isset($_SESSION['SHOPID'])) {
     $shopid = $_SESSION['SHOPID'];
 } else {
     $shopid = 0;
 }
 
 include 'lib/connection.php';
 
 $sql = "SELECT * FROM `order` WHERE shop_id='$shopid' and status='delivered'";
 $result = $conn->query($sql);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/pending_orders.css">

</head>
<body>

<div class="container pendingbody">
  <h5>All Orders</h5>
<table class="table">
  <thead>
    <tr>

      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Total Product</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $totalProduct = $row["totalproduct"];
              $productInfo = explode(",", $totalProduct);
              $productList = [];
              foreach ($productInfo as $info) {
                $info = str_replace(")", "", $info);
                $infoParts = explode("(", $info);
                
                if (count($infoParts) === 2) {
                    $productId = $infoParts[0];
                    $quantity = $infoParts[1];
                    
                    // Query the product name from the database using $productId
                    $product_query = mysqli_query($conn, "SELECT name FROM product WHERE id='$productId'");
                    $product = mysqli_fetch_assoc($product_query);
                    
                    if ($product) {
                        $productList[] = $product["name"] . " (" . $quantity . ")";
                    } else {
                        $productList[] = "Product not found"; // Handle the case where the product doesn't exist
                    }
                }
            }
            
            $productNames = implode(", ", $productList);
    <tr>

      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["address"] ?></td>
      <td><?php echo $row["phone"] ?></td>
      <td><?php echo $productNames ?></td>
      <td><?php echo $row["totalprice"] ?></td>
      <td><?php echo $row["status"] ?></td>
    </tr>
    <?php 
    }
        } 
        else {
        echo '<script>alert("NO CONFIRMED ORDERS FOR YOUR SHOP");</script>';
       echo '<script>window.location.href = "home.php";</script>';
        }?>
  </tbody>
</table>
</div>
    
</body>
</html>