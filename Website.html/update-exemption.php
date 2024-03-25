<?php
// Database connection settings
require_once 'login.php';

// Initialize variables for exemption details
$Exemptiontype = $exemptionstartdate = $exemptionenddate = '';
$update_success = false;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Exemptiontype = $_POST['Exemptiontype'];
    $exemptionstartdate = $_POST['exemptionstartdate'];
    $exemptionenddate = $_POST['exemptionenddate'];

    // Connect to the database
    $conn = new mysqli($hn, $un, $pw, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    //$user = $_SESSION['user'];
//$userID = $user->userid;
$userID = 1;

     // Insert data into the databa
    $sql = "UPDATE exemption SET Exemptiontype = '$Exemptiontype', Exemptionstartdate = '$exemptionstartdate', Exemptionstartdate = '$exemptionenddate' Where UserID = $userID";

    //echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Exemption request submitted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Exemption - Venice Tourist Tax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your CSS styles */
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <!-- Jumbotron - Welcome Section -->
    <!-- Update Exemption Form -->
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Update Exemption</h1>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="Exemptiontype">Exemption Type</label>
                        <input type="text" class="form-control" id="Exemptiontype" name="Exemptiontype" placeholder="Enter Exemption Type" value="<?php echo $Exemptiontype; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exemptionstartdate">Exemption Start Date</label>
                        <input type="text" class="form-control" id="exemptionstartdate" name="exemptionstartdate" placeholder="Enter Exemption Start Date" value="<?php echo $exemptionstartdate; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exemptionenddate">Exemption End Date</label>
                        <input type="text" class="form-control" id="exemptionenddate" name="exemptionenddate" placeholder="Enter Exemption End Date" value="<?php echo $exemptionenddate; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Exemption</button>
                </form>
                <?php if ($update_success) echo '<div class="alert alert-success mt-3" role="alert">Exemption details updated successfully!</div>'; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
