<html>
<head>
    <link rel="stylesheet" type="text/css" href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/css/signupP.css" />
        <link href="css/bootstrap.css" rel="stylesheet">

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
                <a class="navbar-brand" href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/full-slider.html">MiddLife</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/eventinfo.php">Create an Event</a>
                    </li>
                    <li><a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/search.php">Search</a>
                    </li>
                    <li><a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/loginpage.php" class="btn-login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>
<div class ="top">
	<form  method = "post" action = "insert.php">

		Event Name: <input type = "text" name = "event_name" required><br>
		Location: <input type = "text" name = "location" required><br>
		Start Time: <input type = "datetime-local" name = "start_time" required> <br>
		End Time: <input type = "datetime-local" name = "end_time" required> <br>
		Description: <textarea name = "description" rows = "5" cols="40"></textarea><br>
		<!-- <input type="text" name = "approved"> <br> -->
		<input type = "submit" value = "Submit"><br>

	</form>
</div>




</body>
</html>