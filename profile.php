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
            </ul>
        </div>
            <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
    </nav>


    <div class="container top" id="wrap">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="edit.php" method="post" accept-charset="utf-8" class="form" role="form">   <legend>Edit Profile</legend>
                    <h4></h4>
                    <?php

                        $sql = "SELECT first_name, last_name, email FROM Users WHERE " 
                    ?>
                    <div class="row">
                        <div class="col-xs-6 col-md-6 row">
                            <h5 class="">First Name: George</h5>
                            <h5 class="first-name"></h5>   <!-- This is where the first name will go -->       
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <h5 class="last-name">Last Name: Katsaounis</h5> <!-- This is where the last name will go -->
                            <h5></h5>
                        </div>
                    </div>
                    <h5>Email:</h5>
                    <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  />
                    <input type="password" name="confirm" value="" class="form-control input-lg" placeholder="Confirm Password"  />
                    <h4>Organisazions Stared:</h4>
                    <button class="btn btn-primary" type="submit">Submit Changes</button>
                </form>          
            </div>
        </div>            
    </div>

</body>