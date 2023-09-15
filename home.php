<?php
 include'header.php';
 include'lib/connection.php';

 $sql = "SELECT * FROM product";
 $result = $conn -> query ($sql);

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
  $user_id=$_POST['user_id'];;
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_id = $_POST['product_id'];
  $product_quantity = 1;

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE productid = '$product_id'  && userid='$user_id'");

  if(mysqli_num_rows($select_cart) > 0){
    echo '<script>alert("PRODUCT ALREADY IN THE CART");</script>';
    echo '<script>window.location.href = "home.php";</script>';
  }else{
     $insert_product = mysqli_query($conn, "INSERT INTO `cart`(userid, productid, name, quantity, price) VALUES('$user_id', '$product_id', '$product_name', '$product_quantity', '$product_price')");
     echo '<script>alert("PRODUCT ADDD IN THE CART");</script>';
     echo '<script>window.location.href = "home.php";</script>';
  }

}

?>


<style>
    /*------- product item start -------*/
.product-item {
  border: 1px solid #e5e5e5;
  border-radius: 4px;
  -webkit-transition: 0.4s;
  -o-transition: 0.4s;
  transition: 0.4s;
  position: relative;
  text-align: center; }
  .product-item:hover {
    border-color: #e3a51e; }
    .product-item:hover .product-action-link a {
      opacity: 1;
      visibility: visible; }
      .product-item:hover .product-action-link a:first-child {
        right: 130px; }
      .product-item:hover .product-action-link a:last-child {
        left: 130px; }

.product-thumb {
  overflow: hidden;
  border-radius: 4px;
  margin: 0 auto;
  text-align: center; }
  .product-thumb img {
    margin-left: auto;
    margin-right: auto; }

.product-content {
  padding: 20px 15px 40px; }
  .product-content .product-name {
    padding-bottom: 12px; }

.product-name {
  font-size: 18px;
  font-weight: 400;
  text-transform: capitalize; }
  .product-name a {
    color: #333333;
    font-weight: 500; }
    .product-name a:hover {
      color: #e3a51e; }

.price-box {
  font-family: "Montserrat", sans-serif;
  line-height: 1; }

.price-regular {
  color: #333333;
  font-size: 18px; }

.price-old {
  font-size: 16px; }

.ratings {
  font-size: 16px;
  color: #e3a51e; }

.product-action-link a {
  left: 0;
  right: 0;
  bottom: -23px;
  margin: auto;
  position: absolute;
  color: #e3a51e;
  width: 46px;
  height: 46px;
  font-size: 20px;
  line-height: 46px;
  background-color: #fff;
  text-align: center;
  display: inline-block;
  border-radius: 50%;
  border: 1px solid #e3a51e;
  z-index: 1;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: 0.6s;
  -o-transition: 0.6s;
  transition: 0.6s; }
  .product-action-link a:hover {
    color: #fff;
    background-color: #e3a51e; }
  .product-action-link a:nth-child(2) {
    z-index: 2;
    opacity: 1;
    visibility: visible; }
  .product-action-link a span {
    display: block; }

.product-item:hover .product-thumb img,
.pro-item-small:hover .product-thumb img,
.product-list-item:hover .product-thumb img {
  -webkit-transform: scale(1.2);
  -ms-transform: scale(1.2);
  transform: scale(1.2); }

/*------- product item end -------*/
  </style>
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
          <!-- <h4>All Products</h4>
          <p>A passage of Lorem Ipsum you need here</p> -->

        </div>
        
        
      </div>

    </div>
  </div>
  <div class="container">
  <div class="row">


            
          </div>
  </div>
</section>
  <!-- our product area start -->
  <section class="our-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Our Shops</h2>
                            <p class="sub-title">Our Shops We are manufacturer and supplier best series of  Casual Shoes, Womens SportsShoes, Canvas Shoes, Mens Ankle Boots and Mens Sandals.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 mbn-50 slick-row-15 slick-arrow-style">
                            <!-- product single item start -->
								<?php
										$sql="select * from shops;";
										$result=mysqli_query($conn,$sql);
										while($row=mysqli_fetch_array($result))
										{
                      if ($row["status"] == 'accepted') {
											?>
                            <div class="product-item mb-50">
                                <div class="product-thumb">
                               <!-- <a href="product details.php"> -->
							    <a href="producthome.php?shopid=<?php echo $row['shop_id'];?>">
                                        <img height="200"src="shop/<?php echo $row['shopimage']?>" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">

                                        <a href="producthome.php?shopid=<?php echo $row['shop_id'];?>"><?php echo $row['shopname']?></a>
                                    </h5>
                                    <div class="price-box">
                                        <span class="price-regular" style="font-style: italic;font-size: 15px;">Ownered By <?php echo $row['shopownername']?></span>
                                        
                                    </div>
                                    <div class="product-action-link">
                                        <!-- <a href="#" data-toggle="tooltip" title="Wishlist"><i class="ion-android-favorite-outline"></i></a> -->
                                        <a href="producthome.php?shopid=<?php echo $row['shop_id'];?>" data-toggle="tooltip" title="Shop Name :<?php echo $row['shopname']?>"><i class="ion-bag"></i></a>
                                        <!-- <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                            title="Quick View"><i class="ion-ios-eye-outline"></i></span> </a> -->
                                    </div>
                                </div>
                            </div>
							<?php
										}}
							?>
                            <!-- product single item start -->

                            
                            
                            <!-- product single item start -->
                        </div>
                    </div>
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

