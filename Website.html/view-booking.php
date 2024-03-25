<?php
require_once 'login.php';
require_once 'user.php';

// Start the session
session_start();

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

// Define $result outside of the conditional block
$result = null;

// Check if UserID is set in the session
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
    $userID = $user->userid;
	
	//print_r($_SESSION['user']);

    // Modify the SQL query to select bookings associated with the logged-in user's UserID
    $query = "SELECT BookingID, UserID, NumberOfAdults, NumberOfChildren, DateOfVisit, TimeOfVisit 
              FROM booking 
              WHERE UserID = $userID";
	//echo $query;
    $result = $conn->query($query);
    if (!$result) die($conn->error);
} else {
    // Handle the case when the UserID is not set in the session
    echo "Error: UserID not found in session.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Current Bookings</title>
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
            </ul>
        </div>
    </nav>

	    <!-- Jumbotron - Welcome Section -->
    <div class="jumbotron">
        <h1 class="display-4" style="color: #fff;">Welcome to Venice Tourist Tax Website</h1>
        <p class="lead" style="color: #fff;">Explore the beauty of Venice while managing tourist taxes efficiently.</
    </p>
    </div>


    <h2>User Bookings</h2>
    <ul>
        <?php
        // Display the bookings associated with the logged-in user if $result is defined
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $BookingID = $row['BookingID'];
                $UserID = $row['UserID'];
                $NumberOfAdults = $row['NumberOfAdults'];
                $NumberOfChildren = $row['NumberOfChildren'];
                $DateOfVisit = $row['DateOfVisit'];
                $TimeOfVisit = $row['TimeOfVisit'];
                echo "<li><a href='booking-details.php?BookingID=$BookingID'>BookingID: $BookingID | UserID: $UserID | Adults: $NumberOfAdults | Children: $NumberOfChildren | Date: $DateOfVisit | Time: $TimeOfVisit</a></li>";
            }
        }
        ?>
    </ul>
</body>
</html>
