<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/css/signupP.css" />

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
                <a class="navbar-brand" href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/main.html">MiddLife</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/templates/create_event.html">Create an Event</a>
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
    <div class="top">
		<h1>Login</h1>
		<form method = "post" action ="login.php">

			Email: <input type= "text" name = "email" required><br>
			Password: <input type="password" name="password" required><br>
			<input type="submit" class="btn btn-primary" value="Login"/>
			<a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/templates/signupP.html" class="btn btn-primary">Sign Up</a>

		</form>
	</div>

	</body>
</html>
