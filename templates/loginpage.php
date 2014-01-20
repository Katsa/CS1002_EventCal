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
    <div class="col-md-6 col-md-offset-3">
                <form action = "http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/login.php" method="post" accept-charset="utf-8" class="form" role="form">   
                    <legend>Login</legend>
                        <h4>Login</h4>
                        <div class="row">
                            <div class="span4">
                                <input type="text" name="email" value="" class="form-control input-lg" placeholder="email" required/>
                            </div>
                            <div class="">
                                <input type="password" name="password" value="" class="form-control input-lg" placeholder="Shhhh"  required/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <button class="btn btn-primary btn-block signup-btn" type="submit">Login</button>
                            <a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/templates/signupP.html" class="btn btn-primary btn-block signup-btn">Sign Up</a>
                        </div>
                </form>          
              </div>
            </div> 

	</body>
</html>

