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
    <div class="col-md-6 col-md-offset-3">
        <div>
            <legend class="top title"><?php echo "$data[title]";?></legend>
            <a href="#" class="btn btn-primary ">Edit</a>
            <div class="creator">
                <h4>By: <?php echo "$creator[first_name]"?> <?php echo "$creator[last_name]"?></h4>
            </div>
        </div>
        <div class="row">
            <div class="time col-xs-5">
                <h4>Start Date: <?php $date = new DateTime($data[start_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[start_time])); ?></h4>
                <h4>End Date: <?php $date = new DateTime($data[end_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[end_time])); ?></h4>  
            </div>
            <div class ="location">
                <h4>Location: <?php echo "$data[location]";?></h5>
            </div>
        </div>
        <div class="desc">
            <h4>Description: </h4>
            <div class="descr"><?php echo "$data[description]";?></div>
        </div>
        </div>
       
        
    </div>
</body>
</html>