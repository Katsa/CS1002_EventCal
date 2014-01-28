<?php session_start();

    define('DB_SERVER', 'panther.cs.middlebury.edu');
	define('DB_USERNAME', 'jcepeda');
   	define('DB_PASSWORD', 'ForRealThough');
   	define('DB_DATABASE', 'jcepeda_middCal');
    	
   	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
?>

<html>
<head>
    
<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <?php
    $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time FROM Events WHERE eventid='$_GET[id]'";
    $sql2 = "SELECT first_name, last_name FROM CREATED_BY C, Users U WHERE C.eventid ='$_GET[id]' AND C.email=U.email";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);
    }
    $data = mysqli_fetch_array($result);
    $creator = mysqli_fetch_array($result2);


        ?>
    <legend class="top title"><?php echo "$data[title]";?></legend>
    <div class="creator">
        <h4>By: <?php echo "$creator[first_name]"?> <?php echo "$creator[last_name]"?></h4>
    </div>
    <div class="time">
        <h4>Start Date: <?php echo "$data[start_date]";?> <?php echo "$data[start_time]";?></h4>
        <h4>End Date: <?php echo "$data[end_date]";?> <?php echo "$data[date_time]";?></h4>
    </div>
    <div class ="location">
        <h4>Location: <?php echo "$data[location]";?></h5>
    </div>
    <div class="desc">
        <h4>Description: <?php echo "$data[description]";?></h4>
    </div>
</body>
</html>