<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['BookingID'])){
	
	$BookingID = $_GET['BookingID'];

$query = "SELECT * FROM booking where BookingID = $BookingID ";


$result = $conn->query($query); 
if(!$result) die($conn->error);

//example 10-5 - updated
if($result->num_rows > 0)  //there is more than 0 row
{
	while($row = $result->fetch_array(MYSQLI_ASSOC)){	
echo <<<_END


	<form action='booking-details.php' method='post'>

	<pre>
	
	Booking ID: $row[BookingID]
	Number Of Adults: <input type='text' name='NumberOfAdults' value='$row[NumberOfAdults]'>
	Number of Children: <input type='text' name='NumberOfChildren' value='$row[NumberOfChildren]'>
	Date of Visit: <input type='text' name='DateOfVisit' value='$row[DateOfVisit]'>
	Time of Visit: <input type='text' name='TimeOfVisit' value='$row[TimeOfVisit]'>
	
		
	<input type='hidden' name='update' value='yes'>
	<input type='hidden' name='BookingID' value='$row[BookingID]'>
	<input type='submit' value='UPDATE RECORD'>	
	<input type='submit' name='delete' value='Delete Booking'> 

		
	</pre>
	</form>

_END;

	}
}
}

if(isset($_POST['update'])){
	
	$BookingID = $_POST['BookingID'];
	$NumberOfAdults = $_POST['NumberOfAdults'];
	$NumberOfChildren = $_POST['NumberOfChildren'];
	$DateOfVisit = $_POST['DateOfVisit'];
	$TimeOfVisit = $_POST['TimeOfVisit'];
		
	$query = "Update booking set NumberOfAdults='$NumberOfAdults', NumberOfChildren='$NumberOfChildren', 
	DateOfVisit='$DateOfVisit' where BookingID = $BookingID ";
	
	echo $query;
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: view-booking.php");
		
}

if(isset($_POST['delete']))
{
	$BookingID = $_POST['BookingID'];

	$query = "DELETE FROM booking WHERE BookingID='$BookingID' ";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: view-booking.php");
	
}




$result->close();
$conn->close();

?>