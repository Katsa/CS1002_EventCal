<html>
<head>
	<?php

		$email = $_POST["email"];
        $password = $_POST["password"];

		define('DB_SERVER', 'panther.cs.middlebury.edu');
		define('DB_USERNAME', 'jcepeda');
		define('DB_PASSWORD', 'ForRealThough');
		define('DB_DATABASE', 'jcepeda_middCal');
		
		$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
		$sql = "SELECT email FROM Users WHERE email = $email AND password = $password"; //Needs work here
		
		if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}
		else {
			$result = mysqli_query($con, $sql);
		}
		echo $result;
		echo 'test';

		if (!$result) {
			echo "Incorrect email or password";
		}
		else {
			echo "Welcome" $_POST["email"];
		}

		mysql_close($con)

	?>
	<!-- <meta http-equiv = "refresh" content = "3"; URL="main.html"> -->
</head>
</html>
