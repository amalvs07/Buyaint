<?php
 include'header.php';
 include'lib/connection.php';


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

if (isset($_POST['order_btn'])) {
  $userid = $_POST['user_id'];
  $name = $_POST['user_name'];
  $number = $_POST['number'];
  $address = $_POST['address'];
  $status = "pending";

  $cart_query = mysqli_query($conn, "SELECT * FROM `cart` where userid='$userid'");
  $price_total = 0;
  $flag = 0;

  if (mysqli_num_rows($cart_query) > 0) {
      $product_names = array();
      $shop_id = null;

      while ($product_item = mysqli_fetch_assoc($cart_query)) {
          $product_names[] = $product_item['productid'] . ' (' . $product_item['quantity'] . ')';
          $product_price = number_format($product_item['price'] * $product_item['quantity']);
          $price_total += $product_price;

          $product_id = $product_item['productid'];
          $product_quantity = $product_item['quantity'];

          $product_query = mysqli_query($conn, "SELECT * FROM product WHERE id='$product_id'");
          $product_row = mysqli_fetch_assoc($product_query);

          if ($product_quantity <= $product_row['quantity']) {
              $update_id = $product_id;
              $updated_quantity = $product_row['quantity'] - $product_quantity;
              $update_quantity_query = mysqli_query($conn, "UPDATE `product` SET quantity = '$updated_quantity' WHERE id = '$update_id'");

              $flag = 1;

              if ($shop_id === null) {
                  $shop_id = $product_row['shop_id'];
              }
          } else {
              $alertMsg = "Out of stock " . $product_row['name'] . " Quantity: " . $product_row['quantity'];
              echo '<script>alert("' . $alertMsg . '");</script>';
              echo '<script>window.location.href = "home.php";</script>';
             // header("location: home.php");
          }
      }

      if ($flag == 1) {
          $total_product = implode(', ', $product_names);
          $detail_query = mysqli_query($conn, "INSERT INTO `order`(user_id, shop_id, name, address, phone, totalproduct, totalprice, status) VALUES ('$userid', '$shop_id', '$name', '$address', '$number', '$total_product', '$price_total', '$status')");

          if ($detail_query) {
              $cart_query1 = mysqli_query($conn, "DELETE FROM `cart` WHERE userid='$userid'");
              echo '<script>window.location.href = "home.php";</script>';
              //header("location: home.php");
          } else {
              echo '<script>alert("Error placing order.");</script>';
              echo '<script>window.location.href = "home.php";</script>';
              //  header("location: home.php");
          }
      }
  }
}



$id = $_SESSION['userid'];
$sql = "SELECT * FROM cart where userid='$id'";
$result = $conn->query($sql);

if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];

    // Get product information from cart
    $cart_product_query = mysqli_query($conn, "SELECT * FROM cart WHERE id='$update_id'");
    $cart_product = mysqli_fetch_assoc($cart_product_query);

    // Get corresponding product information from the product table
    $product_query = mysqli_query($conn, "SELECT * FROM product WHERE id='{$cart_product['productid']}'");
    $product = mysqli_fetch_assoc($product_query);

    if ($update_value <= $product['quantity']) {
        // Update the cart quantity
        $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
        if ($update_quantity_query) {
            echo '<script>alert("UPDATED SUCCESSFULLY");</script>';
            echo '<script>window.location.href = "cart.php";</script>';
            // header('location: cart.php');
        } else {
            echo '<script>alert("Error updating quantity.");</script>';
            echo '<script>window.location.href = "cart.php";</script>';
            //header("location: cart.php");
        }
    } else {
        $alertMsg = "Out of stock " . $product['name'] . " Quantity: " . $product['quantity'];
        echo '<script>alert("' . $alertMsg . '");</script>';
        echo '<script>window.location.href = "cart.php";</script>';
        //header("location: cart.php");
    }
}

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
  echo '<script>alert("REMOVED SUCCESFULLY");</script>';
  echo '<script>window.location.href = "cart.php";</script>';
  //header('location:cart.php');
};


?>

<div class="container pendingbody">
  <h5>cart</h5>
<table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
   $total=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>

    <tr>
              
      <!-- <th scope="row">1</th> -->
      <td><?php echo $row["name"] ?></td>
  
      <td><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="update_quantity_id"  value="<?php echo  $row['id']; ?>" >
        <input type="number" name="update_quantity" min="1"  value="<?php echo $row['quantity']; ?>" >
        <input type="submit" value="update" name="update_update_btn">
      </form></td> 
      <td><?php echo $row["price"]*$row["quantity"]  ?></td>
      <?php $total=$total+$row["price"]*$row["quantity"] ;?>
     

      <input type="hidden" name="status" value="pending">   
      <td><a href="cart(1).php?remove=<?php echo $row['id']; ?>">remove</a></td>
    </tr>
    <?php 
    }
    
        } 
        else {
        echo '<script>alert("Cart is Empty.");</script>';
        echo '<script>window.location.href = "home.php";</script>';
        }
        ?>
  
  </tbody>
</table>
<style>
.myDiv {
  background-color: lightblue;    
  text-align: right;
}
</style>


<div class="myDiv">
<?php echo "<h style='font-size: 24px;'>Total Amount= $total</h>"; ?>
</div>

<tbody>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <h5>If Cash On delivary Then Put 0 in bkash Field</h5>
      <div class="input-group form-group">
      <input type="hidden" name="total" value="<?php echo $total ?>">
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid']; ?>">
      <input type="hidden" name="user_name" value="<?php echo $_SESSION['username']; ?>">
        <input type="text" class="form-control" placeholder="Address" name="address">
       </div>
       <div class="input-group form-group">
        <input type="number" class="form-control" placeholder="Phone Number" name="number">
       </div>
      <div class="form-group">
      <input type="submit" value="Order Now" name="order_btn">
    </div>

    </form>
      </tbody>
</div>


<?php
 include'footer.php';
?>