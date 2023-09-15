<?php
include 'h.php';
include "lib/connection.php";
$result = null;
  if (isset($_POST['u_submit'])) 
  {
    $s_o_name=$_POST['s_o_name'];
    $s_name=$_POST['s_name'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $fileename = $_FILES["uploadfile"]["name"];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['c_pass'];

    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "shop_img/".$fileename;
    if (move_uploaded_file($tempname, $folder)) {
        // Image uploaded successfully
        $imagePathForDatabase = $folder;
        
        // Assuming you have a database connection already established
        // Insert data into the database
        $insertSql = "INSERT INTO shops(shopownername , shopname, shopimage,address,phone, email, password,status) VALUES ('$s_o_name', '$s_name','$imagePathForDatabase','$address','$phone','$email', '$pass','pending')";
    
       

         if ($conn -> query ($insertSql)) 
         {
            echo '<script>alert("SHOP REGISTERED SUCCESFULLY WAIT FOR ADMIN TO ACCEPT");</script>';
            //header("location:login.php");
         }
         else
         {
             die($conn -> error);
         }
   
  } 
  }

 //echo $result_std -> num_rows;


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>411</title>



</head>

<body class="bg-gradient-primary">

    <div class="container">
   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                <?php echo $result;  ?>
                            </div>
                                <div class="form-group">
                                   
                                        <input type="text" class="form-control form-control-user" id="exampleFirstSOName"
                                            placeholder="Full Name" name="s_o_name">
    
    
                                </div>
                                <div class="form-group">
                                   
                                   <input type="text" class="form-control form-control-user" id="exampleFirstSName"
                                       placeholder="Shop Name" name="s_name">


                           </div>
                           <div class="form-group">
                                   
                                   <input type="text" class="form-control form-control-user" id="exampleFirstAddress"
                                       placeholder="Address" name="address">


                           </div>
                           <div class="form-group">
                                   
                                   <input type="number" class="form-control form-control-user" id="exampleFirstPhone"
                                       placeholder="Phone Number" name="phone">


                           </div>
                           <div class="form-group">
                                   

                             <label for="uploadfile" class="form-label">Image</label>
                             <input type="file" name="uploadfile" />
    


                           </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="pass">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="c_pass">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="u_submit">Register Shop</button>
                            

                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    </div>


</body>

</html>