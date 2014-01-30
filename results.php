<?php session_start();
    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

    if (isset($_POST[creator])) {
		$sql = "SELECT C.* FROM CREATED_BY C, Users U WHERE U.first_name LIKE '%$_POST[creator]%' OR U.last_name LIKE '%$GET[creator]%' AND U.email = C.email";
    }
    else if (isset($_POST[title])) {
    	$sql = "SELECT * FROM Events WHERE title LIKE '%$_POST[title]%';";
    }
    else if (isset($_POST[location])) {
    	$sql = "SELECT * FROM Events WHERE location LIKE '%$_POST[location]%';";
    }
    else if (isset($_POST[start_date])) {
    	$sql = "SELECT * FROM Events WHERE start_date = '$_POST[start_date]';";
    }
    else if (isset($_POST[tags])) {
    	$sql = "SELECT * FROM Events WHERE start_date = '$_POST[start_date]';";
    }

 	if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
    }
?>
<html>

<head>

<?php include 'include/header.php'; ?>

</head>

<body>

<?php include 'include/navbar.php'; ?>

<div class="container">
    <table class="table custab text">
        <thead>
            <tr>
            	<th>Title</th>
                <th>Location</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Description</th>
            </tr>
        </thead>
        <?php
            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]; ?>';" onmouseout="this.style.background='';" onmouseover="this.style.background='black';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 140) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>

                    </div>
                </div>

</body>
</html>