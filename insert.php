<?php
	define('DB_SERVER', 'panther.cs.middlebury.edu');
	define('DB_USERNAME', 'jcepeda');
	define('DB_PASSWORD', 'ForRealThough');
	define('DB_DATABASE', 'jcepeda_middCal');
	
	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

	$sql = "INSERT INTO Events (Title, Location, Start_Time, End_Time, Waiting_for_Approval, Description)
	VALUES
	('$_POST[event_name]', '$_POST[location]', '$_POST[start_time]', '$_POST[end_time]', '0', '$_POST[description]')";

	if (!mysqli_query($con, $sql)) {
		die('Error: ' . mysqli_error($con));
	}

	echo "Your Event Has Been Submitted For Approval";

	mysql_close($con)
	
	?>