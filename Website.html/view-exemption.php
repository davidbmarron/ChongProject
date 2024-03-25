<?php
// Database connection settings
require_once 'login.php';

// Initialize variables for exemption details
$Exemptiontype = $exemptionstartdate = $exemptionenddate = '';

// Connect to the database
$conn = new mysqli($hn, $un, $pw, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$user = $_SESSION['user'];
//$userID = $user->userid;

// Fetch exemption details from the database
$sql = "SELECT * FROM exemption WHERE UserID = 1"; // Adjust the query as needed
$result = $conn->query($sql);

$exemptiontype='';
$exemptionstartdate='';
$exemptionenddate='';

if ($result->num_rows > 0) {
    // Extract data from the result
    $row = $result->fetch_assoc();
    print_r($row);
    $exemptiontype = $row["ExemptionType"];
    $exemptionstartdate = $row["ExemptionStartDate"];
    $exemptionenddate = $row["ExemptionEndDate"];
    $UserID = 1;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Exemption - Venice Tourist Tax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your CSS styles */
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <!-- Jumbotron - Welcome Section -->
    <!-- Exemption Details Section -->
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">View Exemption</h1>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Exemption Details</h5>
                      
                        <p class="card-text">Exemption Type: <?php echo $exemptiontype ?></p>
                        <p class="card-text">Start Date: <?php echo $exemptionstartdate ?></p>
                        <p class="card-text">End Date: <?php echo $exemptionenddate ?></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
