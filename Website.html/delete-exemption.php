<?php
// Database connection settings
require_once 'login.php';

// Delete Exemption function
function deleteExemption() {
    // Connect to the database
    $conn = new mysqli($hn, $un, $pw, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform deletion query
    $sql = "DELETE FROM exemption_details WHERE id = 1"; // Adjust the query as needed
    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success mt-3" role="alert">Exemption deleted successfully!</div>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Check if delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    deleteExemption();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Exemption - Venice Tourist Tax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your CSS styles */
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <!-- Jumbotron - Welcome Section -->
    <!-- Delete Exemption Form -->
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Delete Exemption</h1>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <p>Are you sure you want to delete this exemption?</p>
                    <button type="submit" class="btn btn-danger" name="delete">Delete Exemption</button>
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                        deleteExemption();
                    } ?>
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
