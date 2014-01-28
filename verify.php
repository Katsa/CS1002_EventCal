

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MiddLife</title>

    <!-- Bootstrap core CSS -->
    <!-- Add custom CSS here -->
    <link href="css/bootstrap.css" rel="stylesheet">

    
    <link href="css/full-slider.css" rel="stylesheet">

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
</html>