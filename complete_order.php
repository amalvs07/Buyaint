<?php
include 'lib/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['proceed_payment_btn'])) {
    $userid = $_POST['user_id'];
    $name = $_POST['user_name'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $total = $_POST['total'];
    $paymentMethod = $_POST['payment_method'];
    $status = ($paymentMethod === 'cash_on_delivery') ? 'pending' : 'paid'; // Update status based on payment method

    $order_query = mysqli_query($conn, "INSERT INTO `order`(userid, name, address, phone, totalprice, payment_method, status) VALUES ('$userid', '$name', '$address', '$number', '$total', '$paymentMethod', '$status')");

    if ($order_query) {
        // Clear the cart after successful order placement
        mysqli_query($conn, "DELETE FROM `cart` WHERE userid='$userid'");
        
        // Display the success animation and redirect after a delay
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Payment Completed</title>
            <!-- Add Bootstrap CSS link here -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <!-- Add your custom CSS styles here -->
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background-color: #f8f9fa;
                }
                
                .success-animation {
                    text-align: center;
                }
                
                .checkmark {
                    animation: checkmarkDraw 1.5s ease-in-out;
                    stroke-dasharray: 48;
                    stroke-dashoffset: 48;
                }
                
                @keyframes checkmarkDraw {
                    0% {
                        stroke-dashoffset: 48;
                    }
                    100% {
                        stroke-dashoffset: 0;
                    }
                }
            </style>
        </head>
        <body>
            <div class="container success-animation">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80">
                    <circle cx="40" cy="40" r="36" fill="#28a745"/>
                    <path class="checkmark" fill="none" stroke="#fff" stroke-width="8" d="M17.7,40.3l9.3,9.3c0.4,0.4,1,0.4,1.4,0l21-21c0.4-0.4,0.4-1,0-1.4l-4.3-4.3c-0.4-0.4-1-0.4-1.4,0l-16.5,16.5C17.3,39.3,17.3,39.9,17.7,40.3z"/>
                </svg>
                <h2>Payment Completed!</h2>
                <p>Your order has been successfully placed.</p>
            </div>

            <script>
                // Redirect to home page after a delay
                setTimeout(function() {
                    window.location.href = "home.php";
                }, 3000); // 3000 milliseconds delay (3 seconds)
            </script>
        </body>
        </html>';
        exit();
    } else {
        echo '<script>alert("Error placing order.");</script>';
        echo '<script>window.location.href = "payment.php";</script>';
    }
} else {
    header("Location: payment.php");
    exit();
}
?>
