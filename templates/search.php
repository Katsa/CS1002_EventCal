<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/css/signupP.css" />
    <link href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<SCRIPT LANGUAGE="javascript">
function validate() {
	fm = document.thisForm

	//use validation here to make sure the user entered the information correctly
	fm.submit()
}
</SCRIPT>
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
                <a class="navbar-brand" href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/main.html">MiddLife</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/templates/eventinfo.php">Create an Event</a>
                    </li>
                    <li><a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/templates/search.php">Search</a>
                    </li>
                    <li><a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/templates/loginpage.php" class="btn-login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>
<div class="top">
	<form name="thisForm" method="POST" action="display.php">
		<p>Select what you would like to search by: <select size="2" name="my_dropdown">
			<option value="eventid">Event ID</option>
			<option value="title">event_title</option>
			<option value="location">location</option>
		</select>
		</p>
		<p>
			<input type="button" value="Submit" name="btm_submit" onclick="validate()">
		</p>
	</form>
</div>
</body>
</html>