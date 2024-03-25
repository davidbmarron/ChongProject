<?php
require_once "login.php";
require_once "user.php";

// This block of code processes the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    //Get values from login form
    $tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
    $tmp_password = mysql_entities_fix_string($conn, $_POST['password']);

    //get password from DB w/ SQL
    $query = "SELECT password FROM users WHERE username = '$tmp_username'";
    $result = $conn->query($query);
    if (!$result) die($conn->error);

    $rows = $result->num_rows;
    $passwordFromDB = "";
    for ($j = 0; $j < $rows; $j++) {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $passwordFromDB = $row['password'];
    }

    //Compare passwords
    if (password_verify($tmp_password, $passwordFromDB)) {
        echo "successful login<br>";

        session_start();

        $user = new User($tmp_username);
        $_SESSION['user'] = $user;

        header("Location: booking.php");
        exit(); // Make sure to exit after redirecting
    } else {
        echo "login error<br>";
    }

    $conn->close();
}

// Sanitization functions
function mysql_entities_fix_string($conn, $string){
    return htmlentities(mysql_fix_string($conn, $string));    
}

function mysql_fix_string($conn, $string){
    $string = stripslashes($string);
    return $conn->real_escape_string($string);
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
        <a class="navbar-brand" href="#">Venice Tourist Tax</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login</a> <!-- Changed this to an anchor element -->
                </li>
            </ul>
        </div>
    </nav>

    <!-- Jumbotron - Welcome Section -->
    <div class="jumbotron">
        <h1 class="display-4" style="color: #fff;">Welcome to Venice Tourist Tax Website</h1>
        <p class="lead" style="color: #fff;">Explore the beauty of Venice while managing tourist taxes efficiently.</p>
    </div>

    <!-- Login Page -->
    <div id="login-form" class="container">
        <h2>Login</h2>
        <!-- Login Form -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <!-- Login Button -->
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
        <!-- Link to another page -->
        <p class="mt-3">Don't have an account? <a href="add-user.php">Register here</a></p>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
