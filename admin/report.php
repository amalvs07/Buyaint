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

$sql = "SELECT * FROM reports";
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
      <th scope="col">REPlY</th>
    </tr>
  </thead>
  <tbody>
 
 

      <td><?php echo $row["report_id"] ?></td>
      <td><?php echo $row["address"] ?></td>
      <td><?php echo $row["phone"] ?></td>
      <td><?php echo $row["mobnumber"] ?></td>
      <td><?php echo $row["txid"] ?></td>
      <td><?php echo $row["totalproduct"] ?></td>
      <td><?php echo $row["totalprice"] ?></td>
      <td><?php echo $row["status"] ?></td>
    </tr>
  
  </tbody>
</table>
<?php echo "Total= " . $t ." Taka";?>

</div>
