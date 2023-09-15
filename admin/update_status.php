<?php
 include'lib/connection.php';
 $sql = "SELECT * FROM shops";
 $result = $conn -> query ($sql);

    $shop_id = $_POST["shop_id"];
    
    if (isset($_POST["accept"])) {
        // Admin clicked Accept, update status to 0
        $updateSql = "UPDATE shops SET status = 'accepted' WHERE shop_id = $shop_id";
        
    } elseif (isset($_POST["reject"])) {
        // Admin clicked Reject, update status to 1
        $updateSql = "UPDATE shops SET status = 'rejected' WHERE shop_id = $shop_id";
    }
    
    if ($conn->query($updateSql)) {
        // Status updated successfully
        
        header("location:shop.php");
        // Redirect back to the previous page or perform any other action
    } else {
        // Error updating status
    }

?>
