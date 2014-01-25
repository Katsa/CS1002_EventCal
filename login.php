<?php session_start();
	function encrypt_decrypt($action, $string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

	$email = $_POST[email];
	$password = $_POST[password];

	define('DB_SERVER', 'panther.cs.middlebury.edu');
	define('DB_USERNAME', 'jcepeda');
	define('DB_PASSWORD', 'ForRealThough');
	define('DB_DATABASE', 'jcepeda_middCal');
		
	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
	
	if (isset($_POST[submit])) {
		$sql = "SELECT password, email, first_name, last_name, admin FROM Users WHERE email = '$email';";

		if (!mysqli_query($con, $sql)) {
			die('Error: ' . mysqli_error($con));
		}
		else {
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
		}

		$fetchedpass = $row[password];
		$decrypted_txt = encrypt_decrypt('decrypt', $fetchedpass); //DECRPYTON DOES NOT WORK;
   		if ($decrypted_txt == $password) {
			session_start();
			$_SESSION["email"] = $row[email];
			$_SESSION["name"] = $row[first_name] . " " . $row[last_name];
			$_SESSION["admin"] = $row[admin];
      header("Location: main.php");   //Redirects to main page
		}
	    else { //fix placement
			echo "<br><br><br>Login Failed";
		}
	}
	mysql_close($con)

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
                            <a href="search.html">Advanced Search</a>
                        </li>
                    </ul>
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
      <div class="col-md-6 col-md-offset-3 top">
         <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" accept-charset="utf-8" class="form" role="form">   
            <legend>Login</legend>
            <div class="row">
               <div class="span4">
                  <input type="email" name="email" value="" class=" input-lg" placeholder="Email" required/>
               </div>
               <div class="">
                  <input type="password" name="password" value="" class=" input-lg" placeholder="Password"  required/>
               </div>
            </div>
            <br>
            <div>
               <a href="#" class"forgot_password">forgot password?</a>
            </div>
            <br>
            <div class="row">
               <button class="btn btn-primary" type="submit" name="submit">Login</button>
               <a href="signup.php" class="btn btn-primary ">Sign Up</a>
            </div>
         </form>          
      </div>
   </div>

	</body>
</html>

