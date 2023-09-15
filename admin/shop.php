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
 include'header.php';
 include'lib/connection.php';

 $sql = "SELECT * FROM shops";
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
  <h3><center>All Shops</h3><br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Shop Image</th>
      <th scope="col">Shop Owner Name</th>
      <th scope="col">Shop Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
        <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
    <tr>
    
      <td><?php echo $row["shop_id"] ?></td>
      <td><img src="../shop/<?php echo $row['shopimage']; ?>" style="width:200px;"></td>
      
      <td><?php echo $row["shopownername"] ?></td>
      <td><?php echo $row["shopname"] ?></td>
      <td><?php echo $row["address"] ?></td>
      <td><?php echo $row["phone"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td>
      <form action="update_status.php" method="post">
        <input type="hidden" name="shop_id" value="<?php echo $row['shop_id']; ?>">
        <button type="submit" name="accept">Accept</button>
        <button type="submit" name="reject">Reject</button>
      </form>
        <td>
              <?php
              if ($row["status"] == "accepted") {
                echo "Accepted";
              } else if($row["status"] == "rejected") {
                echo "Rejected";
              }
              else{
                echo "Pending";
              }
              ?>
            </td>
    </tr>
    <?php 
    }
        } 
        else 
            echo "0 results";
        ?>
  </tbody>
</table>
</div>
    
</body>
</html>