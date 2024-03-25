<?php
require_once 'login.php';

// Establish database connection
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die($conn->connect_error);
}

// Query to select all users
$query = "SELECT UserID, Name, Role, UserName, Password, DateOfBirth, Email, PhoneNumber, ResidenceAddress, UserType FROM users";
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
                <li class="nav-item active">
                    <a class="nav-link" href="authenticate.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="User-List.php">User List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-add.php">Add User</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Jumbotron - Welcome Section -->
    <div class="jumbotron">
        <h1 class="display-4" style="color: #fff;">Welcome to Venice Tourist Tax Website</h1>
        <p class="lead" style="color: #fff;">Explore the beauty of Venice while managing tourist taxes efficiently.</p>
    </div>

    <!-- User List Page -->
    <div id="user-list" class="container">
        <h2>User List</h2>
        <ul class="list-group">
            <?php
            // Iterate over the result set and display user information
            while ($row = $result->fetch_assoc()) {
                echo "<li class='list-group-item'>";
                echo "<strong>User ID:</strong> " . $row['UserID'] . "<br>";
                echo "<strong>Name:</strong> " . $row['Name'] . "<br>";
                echo "<strong>Role:</strong> " . $row['Role'] . "<br>";
                echo "<strong>Username:</strong> " . $row['UserName'] . "<br>";
                echo "<strong>Date of Birth:</strong> " . $row['DateOfBirth'] . "<br>";
                echo "<strong>Email:</strong> " . $row['Email'] . "<br>";
                echo "<strong>Phone Number:</strong> " . $row['PhoneNumber'] . "<br>";
                echo "<strong>Residence Address:</strong> " . $row['ResidenceAddress'] . "<br>";
                echo "<strong>User Type:</strong> " . $row['UserType'] . "<br>";
                echo "</li>";
            }
            ?>
        </ul>
        <a href="user-add.php" class="btn btn-primary mt-3">Add User</a>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
