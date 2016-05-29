<?php
	$time = date('H:i:s A', time()+36000);
	$time2 = date('H:i:s A', time()+43200);
	$date = date("Y-m-d");

	if(!empty($time))
	{
		$db = new mysqli("localhost", "root", "", "cabsonline") or die("Unable to connect");
		$query = "SELECT bookingRef, name, lastName, phone, pickUpSub, destination, pickUpDateTime FROM bookings WHERE pickUpDate = '$date' AND pickUpTime BETWEEN '$time' AND '$time2'";
		$queryResult = mysqli_query($db,$query);
        $row = mysqli_fetch_row($queryResult);
            print "<table width='100%' border='1'>";
            print "<tr><th>Booking Reference</th><th>Name</th><th>Phone</th><th>Pick-up Suburb</th><th>Destination</th><th>Pick-up Date/Time</th></tr>";
            if(!$row)
            {
                print"<tr><td>No matching status found</td></tr>";
            }
            while ($row)
            {
                print"<tr><td>{$row[0]}</td>
					<td>{$row[1]} {$row[2]}</td>
					<td>{$row[3]}</td>
					<td>{$row[4]}</td>
					<td>{$row[5]}</td>
					<td>{$row[6]}</td>";
	
            $row = mysqli_fetch_row($queryResult);
            }
            print "</table>";
    }
	else
	{
		ECHO "No bookings within 2 hours found";
	}
?>