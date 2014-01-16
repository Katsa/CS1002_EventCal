<?php
	define('DB_SERVER', 'panther.cs.middlebury.edu');
	define('DB_USERNAME', 'jcepeda');
	define('DB_PASSWORD', 'ForRealThough');
	define('DB_DATABASE', 'jcepeda_middCal');
	
	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

	$sql = "INSERT INTO Events (title, location, start_time, end_time, waiting_for_approval, description)
	VALUES
	('$_POST[event_name]', '$_POST[location]', '$_POST[start_time]', '$_POST[end_time]', '0', '$_POST[description]')";

	if (!mysqli_query($con, $sql)) {
		die('Error: ' . mysqli_error($con));
	}

	echo "Event submitted pending approval.";

	mysql_close($con)
	
	?>