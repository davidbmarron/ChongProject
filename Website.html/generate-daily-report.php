<?php
require_once 'login.php';

// Establish database connection
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die($conn->connect_error);
}

$today = date('Y-m-d');
// Query to select all bookings for today
$query = "SELECT BookingID, UserID, NumberOfAdults, NumberOfChildren, DateOfVisit FROM booking WHERE DateOfVisit = '$today'";
$result = $conn->query($query);
if (!$result) {
    die($conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Daily Report - Venice Tourist Tax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fafafa;
            font-family: 'Arial', sans-serif;
            color: #333; /* Text color */
        }

        .container {
            margin-top: 50px;
        }

        .jumbotron {
            background-color: #6c757d;
            color: white;
            text-align: center;
            padding: 100px;
            margin-bottom: 0;
        }

        .report {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
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
        <h1 class="display-4">Daily Report</h1>
    </div>

    <!-- Report Section -->
    <div class="container">
        <div class="report">
            <h2>Bookings for <?php echo date('F j, Y', strtotime($today)); ?></h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>User ID</th>
                        <th>Number of Adults</th>
                        <th>Number of Children</th>
                        <th>Date of Visit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through each row of the result set
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['BookingID'] . "</td>";
                        echo "<td>" . $row['UserID'] . "</td>";
                        echo "<td>" . $row['NumberOfAdults'] . "</td>";
                        echo "<td>" . $row['NumberOfChildren'] . "</td>";
                        echo "<td>" . $row['DateOfVisit'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
