<?php session_start();
	define('DB_SERVER', 'panther.cs.middlebury.edu');
	define('DB_USERNAME', 'jcepeda');
	define('DB_PASSWORD', 'ForRealThough');
	define('DB_DATABASE', 'jcepeda_middCal');

	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
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
</body>
<html>