<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venice Tourist Tax</title>
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

        .card-deck {
            display: flex;
            justify-content: center;
        }
        
        .entry-rules,
        .penalty {
            margin-top: 30px;
        }

        .entry-rules ul,
        .penalty ul {
            font-size: 0.7em;
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
        <h1 class="display-4" style="color: #fff;">Welcome to Venice Tourist Tax</h1>
        <p class="lead" style="color: #fff;">Explore the beauty of Venice while managing tourist taxes efficiently.</p>
    </div>

    <!-- Tax Overview Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Tax Overview</h2>
                <p>In Venice, tourists are charged a tourist tax for each night of their stay. However, there is a maximum
                    charge for stays longer than five days. After five days, each additional day is free of charge.</p>
                <h4>Pricing Options:</h4>
                <ul>
                    <li>EU Citizens: €2.50 per night</li>
                    <li>Non-EU Citizens: €5.00 per night</li>
                    <li>Children under 18: Free</li>
                    <li>Italian Citizens: Free</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Entry Rules Section -->
    <div class="container entry-rules">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Venice Entry Rules</h2>
                <p>Venice is a globally beautiful and dynamic city, attracting tourists from all over. However, this city
                    is a treasure that requires special conservation measures. As such, the following Venice entry rules
                    exist:</p>
                <ul>
                    <li>Advance Booking Required: Prior reservation of entry tickets is necessary before visiting Venice.
                        This is to conserve the city's tourist attractions and cultural heritage, and to manage visitor
                        numbers.</li>
                    <li>Heritage Conservation: To preserve Venice's historic architecture and landmarks, visitors should
                        take care not to damage heritage sites. They must adhere to legal restrictions and maintain proper
                        conduct in public places.</li>
                    <li>Respect for
    <!-- Cards Section -->
    <div class="container">
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Book Reservation</h5>
                    <p class="card-text">Book your reservation now to explore Venice.</p>
                    <a href="create-booking.html" class="btn btn-primary">Book Now</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Reservation</h5>
                    <p class="card-text">View your existing reservations.</p>
                    <a href="view-booking.html" class="btn btn-primary">View Reservations</a>
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
