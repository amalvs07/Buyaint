<?php
// Assuming you have a database connection established ($conn)
include'header.php';
include'lib/connection.php';

// Assuming you have a database connection established ($conn)
if (isset($_SESSION['userid'])) {
    $id=$_SESSION['userid'];
  }
  else{
    $id=0;
  }

if (isset($_POST["submit"])) {
    // Assuming you have a database connection established ($conn)
    
   // $id = $_POST['user_id']; // Get the user's ID from the session
   // $f_name = $_POST["user_name"]; // Get the user's name from the session
    $report_text = $_POST["report_text"];
    
    // Insert the report into the report table
    $insertSql = "INSERT INTO reports (user_id,report_text) VALUES ('$id','$report_text')";
    
    if ($conn->query($insertSql)) {
        // Report submitted successfully
        echo '<script>alert("Report ADDED Succesfully.");</script>';
    } else {
    
        echo '<script>alert("Error submitting report");</script>';
    }
}
?>
