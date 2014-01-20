<html>
<head>
	<?php
		if ($_POST["password"] != $_POST["confirm"]) {
			echo "Passwords do not match";
		}

		else {
		define('DB_SERVER', 'panther.cs.middlebury.edu');
		define('DB_USERNAME', 'jcepeda');
		define('DB_PASSWORD', 'ForRealThough');
		define('DB_DATABASE', 'jcepeda_middCal');
		
		$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

		$sql = "INSERT INTO Users (password, email, first_name, last_name)
		VALUES
		('$_POST[password]', '$_POST[email]', '$_POST[first_name]', '$_POST[last_name]')";
		
		if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}

		echo "Account created";

		mysql_close($con)

	?>
	<meta http-equiv = "refresh" content" 3; URL=http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/main.php">
</head>
</html>
