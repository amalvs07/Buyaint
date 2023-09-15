<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom CSS styles here -->
    <style>
        /* Your custom styles here */
        .payment-body {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container payment-body">
        <h5>Payment Details</h5>

        <!-- Display the cart items and total amount -->

        <h5>Select Payment Method</h5>
        <form action="complete_order.php" method="post">
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <select class="form-control" name="payment_method" id="payment_method">
                    <option value="cash_on_delivery">Cash on Delivery</option>
                    <option value="bkash">Bkash</option>
                    <!-- Add more payment options if needed -->
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Proceed to Payment" name="proceed_payment_btn">
            </div>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
