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

$sql = "SELECT * FROM report";
$result = $conn -> query ($sql);

?>
<div class="container">
<div class="container pendingbody">
  <h5>All Reports</h5>
<table class="table">
  <thead>
    <tr>

      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">REPORT</th>
      <th scope="col">REPORT</th>
      <th scope="col">Txid</th>
      <th scope="col">Total Product</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $t=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if($row["status"]=="Delivered")
                {
                    $t=$t+$row["totalprice"];

              ?>
    <tr>

      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["address"] ?></td>
      <td><?php echo $row["phone"] ?></td>
      <td><?php echo $row["mobnumber"] ?></td>
      <td><?php echo $row["txid"] ?></td>
      <td><?php echo $row["totalproduct"] ?></td>
      <td><?php echo $row["totalprice"] ?></td>
      <td><?php echo $row["status"] ?></td>
    </tr>
    <?php 
                        
         }
    }

        } 
        else 
            echo "0 results";
        ?>
  </tbody>
</table>
<?php echo "Total= " . $t ." Taka";?>

</div>
