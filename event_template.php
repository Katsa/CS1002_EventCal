<?php session_start();

    define('DB_SERVER', 'panther.cs.middlebury.edu');
	define('DB_USERNAME', 'jcepeda');
   	define('DB_PASSWORD', 'ForRealThough');
   	define('DB_DATABASE', 'jcepeda_middCal');
    	
   	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
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
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search <b class=""></b></a>
                        <ul class="dropdown-menu" style="">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="navbar-form navbar-left" role="search">
                                            <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button">Go!</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <br>
                            <li>
                                <a href="search.php">Advanced Search</a>
                            </li>
                        </ul>
                    </li>
                    <?php  
                        if($_SESSION["email"] != "") { //if logged in
                            echo '<li> <a href="create_event.php">Create an Event</a> </li> <li><a href = "logout.php">Logout</a></li>';
                        }
                        else { //if not logged in
                        echo '<li><a href="login.php" class="btn-login login">Login</a> </li> <li><a href="signup.php">Sign Up</a>';
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