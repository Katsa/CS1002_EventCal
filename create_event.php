<?php session_start();

    if(!isset($_SESSION['email']))
    {
       die('You cannot directly access this page!'); // kill the page display error
    }

    define('DB_SERVER', 'panther.cs.middlebury.edu');
	define('DB_USERNAME', 'jcepeda');
   	define('DB_PASSWORD', 'ForRealThough');
   	define('DB_DATABASE', 'jcepeda_middCal');
    	
   	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

    if (isset($_POST[submit])) {//if form was submitted

        //insert into events\
        $start_date = date('Y-m-d', strtotime($_POST[start_date]));
        $start_time = date('H:i:s', strtotime($_POST[start_time]));
        $end_date = date('Y-m-d', strtotime($_POST[end_date]));
        $end_time = date('H:i:s', strtotime($_POST[end_time]));


    	$sql = "INSERT INTO Events (title, location, start_date, end_date, start_time, end_time, waiting_for_approval, description, edit)
    	VALUES
    	('$_POST[event_name]', '$_POST[location]', '$start_date', '$end_date', '$start_time', 'end_time', '1', '$_POST[description]', '0')";

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
    mysql_close($con);
?>

<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="css/signupP.css" />
  <link rel="stylesheet" type="text/css" href="css/search.css" />
  

  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
  <script type="text/javascript" src="js/sample.js"></script>

</head>
<body>
    <div>
        <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="main.php">MiddLife</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav row">
                    <li>
                        <a href="search.php">Search</a>
                    </li>
                    <?php  
                        if($_SESSION["email"] != "") { //if logged in
                            echo '<li> <a href="create_event.php">Create an Event</a> </li> <li><a href = "logout.php">Logout</a></li>';
                        }
                        else { //if not logged in
                            echo '<li><a href="login.php" class="btn-login login">Login</a> </li>';
                        }
                        if ($_SESSION["admin"] == "1") { //if admin
                            echo '<li><a href="approve.php">Approve</a> </li>';
                        }
                    ?>
                    </ul>
                </div>
                    <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </div>
    <div class="container top" id="wrap">
    	<div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" accept-charset="utf-8" class="form" role="form">   
                    <legend>Create Event</legend>
                        <h4></h4>
                        <div class="row">
                            <div class="span4">
                                <input type="text" name="event_name" value="" class="form-control input-lg" placeholder="Event Name" required/>
                            </div>
                            <div class="">
                                <input type="text" name="location" value="" class="form-control input-lg" placeholder="Where?" required/>
                            </div>
                        </div>
                        <div>
                            <div class="">
                            <label>Start Date</label>
                                <input type = "date" name = "start_date" placeholder="mm/dd/yyyy" required>
                            <label>Start Time</label>
                                <input type = "time" name = "start_time" placeholder="--:-- --"required>
                            </div><br>

                            <div class="">
                            <label>End Date</label>
                                <input type = "date" name = "end_date" placeholder="mm/dd/yyyy" required>
                            <label>End Time</label>
                                <input type = "time" name = "end_time" placeholder="--:-- --" required> <br>
                            </div>
                        </div>
                        <br>
                        <div class="">
                            <textarea class="form-control input-lg" name = "description" rows = "5" cols="40" placeholder="Event Description"></textarea><br>
                        </div>
                        <button class="btn  btn-primary " type="submit" name="submit">Submit Event</button>
                </form>          
            </div>
        </div>            
    </div>
</body>
</html>
