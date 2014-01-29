<?php session_start(); ?>

<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/signupP.css" />
    <link rel="stylesheet" type="text/css" href="css/search.css" />
    <link rel="stylesheet" type="text/css" href="css/full-slider" />
  

    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="js/sample.js"></script>

    <SCRIPT LANGUAGE="javascript">
        function validate() {
                fm = document.thisForm

                //use validation here to make sure the user entered the information correctly
                fm.submit()
        }
    </SCRIPT>

</head>

<body>
    <?php include 'include/navbar.php'; ?>


<!-- php to run the queries -->
<?php

	define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
            
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
	
	// if creator is queried
	if (isset($_POST[creator])) {
		$creator = $_POST[creator];
		$sql = "SELECT C.eventid FROM CREATED_BY C, Users U WHERE U.first_name LIKE '%$creator%' OR U.last_name LIKE '%$creator%' AND U.email = C.email;";

		if (!mysqli_query($con, $sql)) {
			die ('Error: ' . mysqli_error($con));
		}
		else {
			$result = mysqli_query($con, $sql);
		}
	}

/* THIS REALLY NEEDS TO BE FIXED REALLY BADLY LIKE SUPER SAIYAN BAD */

?>

<div class="container top">
  <legend>Search</legend>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <!-- Nav tabs category -->
        <ul class="nav nav-tabs faq-cat-tabs">
            <li class="active"><a href="#faq-cat-1" data-toggle="tab">By Creator</a></li>
            <li><a href="#faq-cat-2" data-toggle="tab">By Title</a></li>
            <li><a href="#faq-cat-3" data-toggle="tab">By Location</a></li>
            <li><a href="#faq-cat-4" data-toggle="tab">By Start Date</a></li>
            <li><a href="#faq-cat-5" data-toggle="tab">By Tags</a></li>
        </ul>

        <!-- creator panel -->
        <div class="tab-content faq-cat-content">
            <div class="tab-pane active in fade" id="faq-cat-1">
                <div class="panel-group" id="accordion-cat-1">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input name="creator" type="text" class="form-control" placeholder="Creator's Name...">
                        </div>
                        <button type="submit" class="btn btn-primary">Search...</button>
                    </form>
                </div>
            </div>

        	<!-- title panel -->
            <div class="tab-pane fade" id="faq-cat-2">
                <div class="panel-group" id="accordion-cat-2">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input name="title" type="text" class="form-control" placeholder="Event's Title...">
                        </div>
                        <button type="submit" class="btn btn-primary">Search...</button>
                    </form>
                </div>
            </div>


        	<!-- location panel -->
            <div class="tab-pane fade" id="faq-cat-3">
                <div class="panel-group" id="accordion-cat-3">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input name="location" type="text" class="form-control" placeholder="Location of Event...">
                        </div>
                        <button type="submit" class="btn btn-primary">Search...</button>
                    </form>
                </div>
            </div>

        	<!-- start date panel -->
            <div class="tab-pane fade" id="faq-cat-4">
                <div class="panel-group" id="accordion-cat-4">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input name="start_date" type="text" class="form-control" placeholder="yyyy-mm-dd">
                        </div>
                        <button type="submit" class="btn btn-primary">Search...</button>
                    </form>
                </div>
            </div>

        	<!-- tags panel -->
            <div class="tab-pane fade" id="faq-cat-5">
                <div class="panel-group" id="accordion-cat-5">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input name="tags" type="text" class="form-control" placeholder="tag1 tag2 tag3 tag4...">
                        </div>
                        <button type="submit" class="btn btn-primary">Search...</button>
                    </form>
                </div>
            </div>

        </div>


            </div>
        </div>
    </div>
</body>
</html>