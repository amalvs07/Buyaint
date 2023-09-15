<?php
 include'header.php';


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
$k=$_SESSION['userid'];
$sql = "SELECT * FROM `order` where user_id='$k'";

$result = $conn -> query ($sql);
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
  <h2><center>All Orders</h2><br><br>
<table class="table">
  <thead>
    <tr>

      <th scope="col">Shop Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Total Product</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $k=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $shopId = $row["shop_id"];
              /*if($row["status"]==0)
              {
                $k="pending";
              }
              if($row["status"]==1)
              {
                $k="confirm";
              }
              if($row["status"]==2)
              {
                $k="delivery in progress";
              }
              if($row["status"]==3)
              {
                $k="delivered";
              }*/
$shopQuery = mysqli_query($conn, "SELECT shopname FROM shops WHERE shop_id='$shopId'");
$shopInfo = mysqli_fetch_assoc($shopQuery);
$shopName = $shopInfo["shopname"];
              $totalProduct = $row["totalproduct"];
                        $productInfo = explode(",", $totalProduct);
                        $productList = [];
                        foreach ($productInfo as $info) {
                            list($productId, $quantity) = explode("(", str_replace(")", "", $info));
                            $product_query = mysqli_query($conn, "SELECT name FROM product WHERE id='$productId'");
                            $product = mysqli_fetch_assoc($product_query);
                            $productList[] = $product["name"] . " (" . $quantity . ")";
                        }
                        $productNames = implode(", ", $productList);
                ?>
    <tr>

      <td><?php echo $shopName ?></td>
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
        echo '<script>alert("NO ORDERS FOUND");</script>';
        echo '<script>window.location.href = "home.php";</script>';}
        ?>
  </tbody>
</table>
</div>
    
</body>
</html>

<?php
 include'footer.php';
?>