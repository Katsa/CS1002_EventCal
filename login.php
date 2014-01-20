<html>
<head>
	<?php
		echo "Test";
		define('DB_SERVER', 'panther.cs.middlebury.edu');
		define('DB_USERNAME', 'jcepeda');
		define('DB_PASSWORD', 'ForRealThough');
		define('DB_DATABASE', 'jcepeda_middCal');
		
		$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

		$sql = "SELECT email FROM Users WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
	
		if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}
		else{
			$result = mysqli_query($con, $sql);
		}

		if (!$result) {
			echo "Incorrect email or password";
		}
		else {
			echo "Welcome" $_POST[email];
		}

		mysql_close($con)

	?>
	<meta http-equiv = "refresh" content" 3; URL=http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/main.php">
</head>
</html>