<?php
 include'header.php';
 include'lib/connection.php';
 if(isset($_GET['shopid']))
 {
    $shopid=$_GET['shopid'];
    $sql = "SELECT * FROM product where shop_id='$shopid'";
    $result = $conn -> query ($sql);
 }


 if(isset($_POST['add_to_cart'])){

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
$user_id = $_POST['user_id']; // Change to session user ID
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_id = $_POST['product_id'];
$product_quantity = 1;

$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE productid = '$product_id' && userid='$user_id'");

if (mysqli_num_rows($select_cart) > 0) {
    echo '<script>alert("Product is already in the cart.");</script>';
    echo '<script>window.location.href = "home.php";</script>';

     // header('location: home.php');
} else {
    // Check if the cart has items from the same shop
    $cart_shop_query = mysqli_query($conn, "SELECT * FROM cart WHERE userid='$user_id'");
    while ($cart_item = mysqli_fetch_assoc($cart_shop_query)) {
        $cart_product_id = $cart_item['productid'];
        $cart_product_shop_query = mysqli_query($conn, "SELECT shop_id FROM product WHERE id='$cart_product_id'");
        $cart_product_shop = mysqli_fetch_assoc($cart_product_shop_query);

        $current_product_shop_query = mysqli_query($conn, "SELECT shop_id FROM product WHERE id='$product_id'");
        $current_product_shop = mysqli_fetch_assoc($current_product_shop_query);

        if ($cart_product_shop['shop_id'] != $current_product_shop['shop_id']) {
            echo '<script>alert("Cannot add products from different shops to the cart.");</script>';
            echo '<script>window.location.href = "home.php";</script>';
            //header('location: home.php');
            exit();
        }
    }

    // Insert product into cart if conditions are met
    $insert_product = mysqli_query($conn, "INSERT INTO `cart`(userid, productid, name, quantity, price) VALUES('$user_id', '$product_id', '$product_name', '$product_quantity', '$product_price')");
    if ($insert_product) {
        echo '<script>alert("Product added to cart successfully.");</script>';
        echo '<script>window.location.href = "home.php";</script>';
        //header('location: home.php');
    } else {
        echo '<script>alert("Error adding product to cart.");</script>';
        echo '<script>window.location.href = "home.php";</script>';
      //  header('location: home.php');
    }
}
}
?>
<!--banner start-->
<div class="banner">
<div class="container">
  <div class="row">
    <div class="col-md-6">
    
        <div class="banner-text">
          <p class="bt1">Welcome To</p>
          <p class="bt2"><span class="bt3">BUYA</span>INT</p>
          <p class="bt4">While physical paint shops provide a hands-on experience, many also have online platforms where customers can browse products, compare options, and even place orders for home delivery or pickup</p>
          
        </div>
  
      
    </div>
    
  <div class="col-md-6">
    
      <img src="" class="img-fluid">
 
  </div>

  </div>
</div>
</div>

<!--banner end-->


<!---top sell start---->

<section>
  <div class="container">
    <div class="topsell-head">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="img/mark.png">
          <h4>All Products</h4>
          <p>A passage of Lorem Ipsum you need here</p>

        </div>
        
        
      </div>

    </div>
  </div>
  <div class="container">
  <div class="row">
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="col-md-3 col-sm-6 col-6">
              <div>
                <img src="shop/product_img/<?php echo $row['imgname']; ?>" >
              </div>
              <div>
              <div>
                <h6><?php echo $row["name"] ?></h6> 
                <span><?php echo $row["Price"] ?></span> 
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'];?>" >
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>"> 
                <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['Price']; ?>">              
              </div>
              <input type="submit" class="btn btn btn-primary" value="add to cart" name="add_to_cart">
              </div>
              
            </div>
            </form>
            <?php 
    }
        } 
        else {
        echo '<script>alert("NO PRODUCTS ADDED BY OWNER");</script>';
        echo '<script>window.location.href = "home.php";</script>';}
        ?>

            
          </div>
  </div>
</section>


<!---top sell end---->


<!---logo start--->

<div class="logo5">
  <div class="container">
    <div class="row">
      <div class="col-md-1">
  
      </div>
      <div class="col-md-2 text-center">
        <img src="img/asian.svg">
      </div>
      <div class="col-md-2 text-center">
        <img src="img/Dulux.svg">
      </div>
      <div class="col-md-2 text-center">
        <img src="img/berger.svg">
      </div>
      <div class="col-md-2 text-center">
        <img src="img/british.svg">
      </div>
      <div class="col-md-2 text-center">
        <img src="img/Nerolac.svg">
      </div>
      <div class="col-md-1">
  
      </div>
    </div>
  </div>
</div>



<!---logo end--->

<!---welcome start--->

<div class="welcome">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6 col-sm-12">
        <span class="welcometitle">Welcome to BUYAINT</span>
        <img src="img/titleful.png">
        <img src="img/titleline.png" class="titleline">

        <div class="row" id="wel1">
          <div class="col-md-2 col-lg-2 col-2">
            <img src="img/w1.png" class="w" class="img-fluid">
          </div>
          <div class="col-md-10  col-lg-10 col-10">
            <h6 class="wh">24x7 online free support</h6>
            <p class="wp">There are many variations of passages Lorem Ipsum available<br>
            but they are many variations </p>
          </div>   
        </div>

         <div class="row" id="wel2">
          <div class="col-md-2 col-lg-2 col-2">
            <img src="img/w1.png" class="w" class="img-fluid">
          </div>
          <div class="col-md-10  col-lg-10 col-10">
            <h6 class="wh">24x7 online free support</h6>
            <p class="wp">There are many variations of passages Lorem Ipsum available<br>
            but they are many variations </p>
          </div>   
        </div>

        <div class="row" id="wel2">
          <div class="col-md-2 col-lg-2 col-2">
            <img src="img/w1.png" class="w" class="img-fluid">
          </div>
          <div class="col-md-10  col-lg-10 col-10">
            <h6 class="wh">24x7 online free support</h6>
            <p class="wp">There are many variations of passages Lorem Ipsum available<br>
            but they are many variations </p>
          </div>   
        </div>

      </div>
      <div class="col-md-12 col-lg-6 col-sm-12">
        <img src="img/comment.png" class="img-fluid">
      </div>
    </div>
  </div>
</div>



<!---welcome end--->



<?php
 include'footer.php';
?>

