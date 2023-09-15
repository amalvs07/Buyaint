<?php
 include'h.php';
 include'lib/connection.php';
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
          <!-- <h4>All Shops</h4>
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

