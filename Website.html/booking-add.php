<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venice Tourist Tax Website</title>
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

        .user-list-item {
            margin-bottom: 10px;
        }
    </style></head>
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


    <h2>Create Booking</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="number_of_adults">Number of adults:</label>
        <input type="number" id="number_of_adults" name="number_of_adults" required><br>
        <label for="number_of_children">Number of Children:</label>
        <input type="number" id="number_of_children" name="number_of_children" required><br>
        <label for="date_of_visit">Date of visit:</label>
        <input type="date" id="date_of_visit" name="date_of_visit" required><br>
        <label for="time_of_visit">Time of visit:</label>
        <input type="time" id="time_of_visit" name="time_of_visit" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="booking.php">Cancel</a>
	
	
	    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <?php
    // Import credentials for database connection
    require_once 'login.php';
	require_once 'user.php';


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);
		
        // Get data from POST object
        $number_of_adults = $_POST['number_of_adults'];
        $number_of_children = $_POST['number_of_children'];
        $date_of_visit = $_POST['date_of_visit'];
        $time_of_visit = $_POST['time_of_visit'];
		
		session_start();
		$user = $_SESSION['user'];
		$UserID = $user->userid;

        // Prepare and execute the SQL query
        $query = "INSERT INTO booking (UserID, NumberOfAdults, NumberOfChildren, DateOfVisit, TimeOfVisit) 
                  VALUES ($UserID, '$number_of_adults', '$number_of_children', '$date_of_visit', '$time_of_visit')";
		echo $query;

        $result = $conn->query($query);
        if (!$result) {
            // Error handling
            echo "Error: " . $conn->error;
        } else {
            // Success message
            echo "Booking added successfully!";
        }
		
		if($conn->query($query) == TRUE){
			$bookingid = $conn->insert_id;		
			$_SESSION['bookingid'] = $bookingid;
			echo $bookingid;			
		}

		header("Location: create-payment.php");
		//exit();
		
        // Close the database connection
        $conn->close();
    }
    ?>

</body>
</html>
