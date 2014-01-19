<?php
	
	define('DB_SERVER', 'panther.cs.middlebury.edu');
	define('DB_USERNAME', 'jcepeda');
	define('DB_PASSWORD', 'ForRealThough');
	define('DB_DATABASE', 'jcepeda_middCal');
	
	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

	$sql = "SELECT $_POST[my_dropdown] from Events";

	if (!mysqli_query($con, $sql)) {
		die('Error: ' . mysqli_error());
	}
	else {
		//execute the SQL query
		$result = mysqli_query($con, $sql);
	}

	$col = $_POST[my_dropdown];
	echo $col.":<br>";
	while($row = mysqli_fetch_array($result)) {
		//print result
		echo $row[$col]."<br>";
	}
	//mysql_close($con)
	 	
	?>