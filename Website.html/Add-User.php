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
	
	
    <div class="jumbotron">
        <h1 class="display-4" style="color: #fff;">Welcome to Venice Tourist Tax Website</h1>
        <p class="lead" style="color: #fff;">Explore the beauty of Venice while managing tourist taxes efficiently.</p>
    </div>


    <h2>Add User</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required><br>
        <label for="date_of_birth">Date Of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" required><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br>
        <label for="residence_address">Residence Address:</label>
        <input type="text" id="residence_address" name="residence_address" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="authenticate.php">Cancel</a>

    <?php
    // Import credentials for database connection
    require_once 'login.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        // Get data from POST object
        $username = $_POST['username'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $date_of_birth = $_POST['date_of_birth'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $residence_address = $_POST['residence_address'];
		

        // Prepare and execute the SQL query
        $query = "INSERT INTO users (Role, Username, Name, Password, DateOfBirth, Email, PhoneNumber, ResidenceAddress) 
                  VALUES ('User', '$username', '$name', '$password', '$date_of_birth', '$email', '$phone_number', '$residence_address')";

        $result = $conn->query($query);
        if (!$result) {
            // Error handling
            echo "Error: " . $conn->error;
        } else {
            // Success message
            echo "User added successfully!";
        }

        // Close the database connection
        $conn->close();
    }
    ?>

</body>
</html>
