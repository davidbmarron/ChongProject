    <?php
	
	require_once 'User.php';
	
	session_start();

 // Import credentials for database connection
    require_once 'login.php';
	//require_once 'User.php';
	
	print_r($_SESSION['user']);
	
	$user = $_SESSION['user'];
	$UserID = $user->userid;



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
