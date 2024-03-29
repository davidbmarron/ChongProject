<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Reports - Venice Tourist Tax</title>
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
            </ul>
        </div>
    </nav>

    <!-- Jumbotron - Welcome Section -->
    <div class="jumbotron">
        <h1 class="display-4" style="color: #fff;">Entry Reports</h1>
        <p class="lead" style="color: #fff;">Generate, export, and analyze entry reports for Venice tourist tax.</p>
    </div>

    <!-- Entry Reports Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Generate Daily Report</h5>
                        <p class="card-text">Generate a daily report to track visitor metrics and revenue trends.</p>
                        <a href="generate-daily-report.php" class="btn btn-primary">Generate Daily Report</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Generate Monthly Report</h5>
                        <p class="card-text">Generate a monthly report to analyze visitor activity over time.</p>
                        <a href="generate-monthly-report.php" class="btn btn-primary">Generate Monthly Report</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Generate Ad-Hoc Report</h5>
                        <p class="card-text">Generate ad-hoc reports for specific analysis needs.</p>
                        <a href="generate-adhoc-report.php" class="btn btn-primary">Generate Ad-Hoc Report</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Export Reports</h5>
                        <p class="card-text">Export reports in various formats for ease of data-sharing and analysis.</p>
                        <a href="export-report.php" class="btn btn-primary">Export Reports</a>
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
