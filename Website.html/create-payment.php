<?php

session_start();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Payment Method - Venice Tourist Tax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fafafa;
            font-family: 'Arial', sans-serif;
            color: #333; /* Text color */
        }

        .navbar {
            background-color: #343a40;
            color: white;
        }

        .container {
            margin-top: 50px;
        }

        .jumbotron {
            background: url('venice.jpg') center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px;
            margin-bottom: 0;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="booking.php">Venice Tourist Tax</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="booking.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="authenticate.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="booking.php">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="User-List.php">User List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Add-User.php">Add User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="payment-management.php">Payment Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Reports.php">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exemption.php">Exemptions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="QRCode.php">QRCode</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Jumbotron - Welcome Section -->
    <div class="jumbotron">
        <h1 class="display-4" style="color: #fff;">Create Payment Method</h1>
        <p class="lead" style="color: #fff;">Add a new payment method for handling financial transactions.</p>
    </div>

    <!-- Create Payment Method Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Enter Payment Method Details</h5>
                        <!-- Payment Method Form -->
                        <form action='create-payment.php' method='post'>
                            <div class="form-group">
                                <label for="paymentMethod">Payment Method</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="Credit Card">
                                    <label class="form-check-label" for="creditCard">
                                        Credit Card
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="PayPal">
                                    <label class="form-check-label" for="paypal">
                                        PayPal
                                    </label>
                                </div>
                            </div>
                            <div id="creditCardDetails" class="form-group" style="display: none;">
                                <label for="creditCardNumber">Credit Card Number</label>
                                <input type="text" class="form-control" id="creditCardNumber" name="creditCardNumber" placeholder="Enter credit card number">
                            </div>
                            <div id="paypalDetails" class="form-group" style="display: none;">
                                <label for="paypalNumber">PayPal number</label>
                                <input type="email" class="form-control" id="paypalNumber" placeholder="Enter PayPal Number">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Payment Method</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https    ://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to show/hide credit card number or PayPal email field based on user selection
        $(document).ready(function () {
            $('input[type="radio"]').click(function () {
                if ($(this).attr('id') == 'creditCard') {
                    $('#creditCardDetails').show();
                    $('#paypalDetails').hide();
                } else if ($(this).attr('id') == 'paypal') {
                    $('#creditCardDetails').hide();
                    $('#paypalDetails').show();
                }
            });
        });
    </script>
	
<?php



// Import credentials for database connection
require_once 'login.php';

// Start session

$bookingid = $_SESSION['bookingid'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
		
	$DateOfPayment = date('Y-m-d'); // Get the current date in the format YYYY-MM-DD
	$PaymentMethod = $_POST['paymentMethod'];
	
	// Get payment details based on selected payment method
	if ($PaymentMethod == 'Credit Card') {
		$PaymentDetails = $_POST['creditCardNumber']; // Assuming you have validation for credit card number
	} elseif ($PaymentMethod == 'PayPal') {
		$PaymentDetails = $_POST['paypalNumber']; // Assuming you have validation for PayPal number
	} else {
		$PaymentDetails = ''; // Handle other payment methods if any
	}

    // Prepare and execute the SQL query
    $query = "INSERT INTO payment (BookingID, Amount, DateOfPayment, PaymentMethod) 
              VALUES ($bookingid, '$PaymentDetails', '$DateOfPayment', '$PaymentMethod')";

	echo $query;

    $result = $conn->query($query);
    if (!$result) {
        // Error handling
        echo "Error: " . $conn->error;
    } else {
        // Success message
        echo "Payment added successfully!";
    }

    // Close the database connection
    $conn->close();
}
?>


</body>

</html>
