<?php
// Database connection settings
require_once 'login.php';

// Initialize variables for form data
$fullname = $nationality = $passport = $age = $gender = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $exemptiontype = sanitize_input($_POST["exemptiontype"]);
    $exemptionstartdate = sanitize_input($_POST["exemptionstartdate"]);
    $exemptionenddate = sanitize_input($_POST["exemptionenddate"]);
    $UserID = 1;
    
    // Connect to the database
    $conn = new mysqli($hn, $un, $pw, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO exemption (UserID, Exemptiontype, Exemptionstartdate, exemptionenddate)
            VALUES ($UserID, '$exemptiontype', '$exemptionstartdate', '$exemptionenddate')";

    //echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Exemption request submitted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Exemption - Venice Tourist Tax</title>
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
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Venice Tourist Tax</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="User-List.html">User List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Add-User.html">Add User</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Jumbotron - Welcome Section -->
    <div class="jumbotron">
        <h1 class="display-4">Create Exemption</h1>
    </div>

    <!-- Exemption Form Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="POST" action="create_exemption.php">
                    <div class="form-group">
                        <label for="exemptiontype">Exemption Type</label>
                        <input type="text" class="form-control" id="exemptiontype" name="exemptiontype" placeholder="exemptiontype" required>
                    </div>
                    <div class="form-group">
                        <label for="exemptionstartdate">Exemption Start Date</label>
                        <input type="text" class="form-control" id="exemptionstartdate" name="exemptionstartdate" placeholder="Enter your exemptionstartdate" required>
                    </div>
                    <div class="form-group">
                        <label for="exemptionenddate">Exemption End Date</label>
                        <input type="text" class="form-control" id="exemptionenddate" name="exemptionenddate" placeholder="Enter your exemptionenddate" required>
                    </div>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
