<?php

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
if (isset($_SESSION['SHOPID'])) {
  $shopid=$_SESSION['SHOPID'];
}
else{
  $shopid=0;
}
 include'header.php';
 include'lib/connection.php';
 $result=null;
if (isset($_POST['submit'])) 
{
    $name=$_POST['name'];
    $catagory=$_POST['catagory'];
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "product_img/".$filename;

   // $imagePathForDatabase = $folder;
   // $insertSql = "INSERT INTO product(name, catagory, description, quantity, price, imgname,shop_id) VALUES ('$name', '$catagory', '$description',$quantity, $price, '$imagePathForDatabase','$shopid')";
   if (move_uploaded_file($tempname, $folder)) {
    // Image uploaded successfully
    $imagePathForDatabase = $folder;
    
    // Assuming you have a database connection already established
    // Insert data into the database
    $insertSql = "INSERT INTO product (name, catagory, description, quantity, price, imgname, shop_id) VALUES ('$name', '$catagory', '$description', $quantity, $price, '$filename', '$shopid')";

   }

    if ($conn -> query ($insertSql)) 
    {
     // $targetDir = "product_img/";
     // $targetPath = $targetDir . basename($filename);
      echo '<script>alert("PRODUCT ADDED Succesfully.");</script>';
      // $result="<h2>*******Data insert success*******</h2>"; 
     
    }
    else
    {
      echo '<script>alert("PRODUCT NOT ADDED Succesfully.");</script>';
   //  die($conn -> error);
 }

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
      <?php echo $result;?>
        <h4>Add Product</h4>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputName">
  </div>
  <div class="mb-3">
    <label for="exampleInputType" class="form-label">Catagory</label>
    <input type="text" name="catagory"  class="form-control" id="exampleInputType">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Description</label>
    <input type="text" name="description" class="form-control" id="exampleInputDescription">
  </div>
  <div class="mb-3">
    <label for="exampleInputQuantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="exampleInputQuantity">
  </div>
  <div class="mb-3">
    <label for="exampleInputPrice" class="form-label">Price</label>
    <input type="Number" name="price" class="form-control" id="exampleInputPrice">
  </div>
  <div class="mb-3">
        <label for="uploadfile" class="form-label">Image</label>
        <input type="file" name="uploadfile" />
    </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</body>
</html>