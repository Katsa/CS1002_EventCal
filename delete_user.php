<?php session_start();
    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

    $sql = "DELETE FROM Users WHERE email = '$_GET[id]';";
	if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);

    session_destroy();
	}
    header("Location: main.php");
?>