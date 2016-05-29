<?php
	
	$bookingRef = $_GET["refNum"];
	
	if(!empty($bookingRef))
	{
		$db = new mysqli("localhost", "root", "", "cabsonline") or die("Unable to connect");
		$query = "UPDATE bookings SET bookingStatus='assigned' WHERE bookingRef=$bookingRef";
        mysqli_query($db,$query);
       
            ECHO "The booking request $bookingRef has been properly assigned.";
    }
	else
	{
		ECHO "Booking reference number not found";
	}
?>

