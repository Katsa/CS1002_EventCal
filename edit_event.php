<?php session_start();

    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

    if (isset($_POST[submit])) {//if form was submitted

        //insert into events
        $start_date = date('Y-m-d', strtotime($_POST[start_date]));
        $start_time = date('H:i:s', strtotime($_POST[start_time]));
        $end_date = date('Y-m-d', strtotime($_POST[end_date]));
        $end_time = date('H:i:s', strtotime($_POST[end_time]));


    	$sql = "INSERT INTO Events (title, location, start_date, end_date, start_time, end_time, waiting_for_approval, description, edit, original_version)
    	VALUES
    	('$_POST[event_name]', '$_POST[location]', '$start_date', '$end_date', '$start_time', 'end_time', '1', '$_POST[description]', '1', '$_POST[id]')";

    	if (!mysqli_query($con, $sql)) {
    		die('Error: ' . mysqli_error($con));
    	}
        $now = date("Y-m-d H:i:s");

        //insert into created_by
    	$sql = "INSERT INTO CREATED_BY (email, time_of_creation) VALUES ('$_SESSION[email]', '$now')";

        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }
            header("Location: main.php");   //Redirects to main page
    }
    else {
        $sql = "SELECT U.email FROM CREATED_BY C, Users U WHERE C.eventid ='$_GET[id]' AND C.email=U.email";
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }
        else {
            $result = mysqli_query($con, $sql);
            $creator = mysqli_fetch_array($result);
        }

        if ($creator[email] != $_SESSION['email'] && $_SESSION['admin'] == '0') 
        {
           die('You cannot directly access this page!'); // kill the page display error
        }
    }
?>

<html>
<head>
    
<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

<?php $sql = "SELECT title, location, start_date, end_date, start_time, end_time, description FROM Events WHERE eventid = '$_GET[id]'";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
    }

?>
    <div class="container top" id="wrap">
    	<div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" accept-charset="utf-8" class="form" role="form">   
                    <legend>Create Event</legend>
                        <h4></h4>
                        <div class="row">
                            <div class="span4">
                                <input type="text" name="event_name" value=<?php echo $row[title]; ?> class="form-control input-lg" placeholder="Event Name" required/>
                            </div>
                            <div class="">
                                <input type="text" name="location" value=<?php echo $row[location]; ?> class="form-control input-lg" placeholder="Where?" required/>
                            </div>
                        </div>
                        <div>
                            <div class="">
                            <label>Start Date</label>
                                <input type = "date" name = "start_date" value=<?php $date = new DateTime($row[start_date]); echo date_format($date, 'm/d/Y');?> placeholder="mm/dd/yyyy" required>
                            <label>Start Time</label>
                                <input type = "time" name = "start_time" value=<?php echo date("g:ia", strtotime($row[start_time])); ?> placeholder="--:-- --"required>
                            </div><br>

                            <div class="">
                            <label>End Date</label>
                                <input type = "date" name = "end_date" value=<?php $date = new DateTime($row[end_date]); echo date_format($date, 'm/d/Y');?> placeholder="mm/dd/yyyy" required>
                            <label>End Time</label>
                                <input type = "time" name = "end_time" value=<?php echo date("g:ia", strtotime($row[start_time])); ?> placeholder="--:-- --" required> <br>
                            </div>
                        </div>
                        <br>
                        <div class="">
                            <textarea class="form-control input-lg" name = "description" rows = "5" cols="40" placeholder="Event Description"><?php echo $row[description]; ?></textarea><br>
                        </div>
                        <input type = "hidden" name = "id" value = <?php echo $_GET[id] ?>>

                        <button class="btn  btn-primary " type="submit" name="submit">Submit Event</button>
                </form>          
            </div>
        </div>            
    </div>
</body>
</html>
