<head>
    <link rel="stylesheet" type="text/css" href="css/signupP.css" />
    <link href="css/bootstrap.css" rel="stylesheet">

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
                <ul class="nav navbar-nav">
                    <li><a href="create_event.html">Create an Event</a>
                    </li>
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
                                            <button class="btn btn-primary" type="button">
                                                Go!</button>
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
                    <li>
                        <a href="login.html" class="btn-login login">Login</a>
                    </li>
                    <li>
                        <a href="approve.php">Approve</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</body>

<div class="container top" id="wrap">
	  <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="#" method="post" accept-charset="utf-8" class="form" role="form">   <legend>Sign Up</legend>
                    <h4></h4>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="first_name" value="" class="form-control input-lg" placeholder="First Name"  />           
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="last_name" value="" class="form-control input-lg" placeholder="Last Name"  />
                        </div>
                    </div>

                    <input type="text" name="email" class="form-control input-lg" placeholder="Your Email"  />
                    <input type="password" name="password" class="form-control input-lg" placeholder="Password"  />
                    <input type="password" name="confirm" class="form-control input-lg" placeholder="Confirm Password"  />
                    <button class="btn btn-primary" type="submit">Create my account</button>
            </form>          
          </div>

          <?php


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

                define('DB_SERVER', 'panther.cs.middlebury.edu');
                define('DB_USERNAME', 'jcepeda');
                define('DB_PASSWORD', 'ForRealThough');
                define('DB_DATABASE', 'jcepeda_middCal');

                $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");


            if (isset($_POST['submit'])) {
                $errors = array();   
                if (empty($_POST['email'])) {
                    $errors[] = "Please Enter an Email";
                }
                else { 
                    $email = $mysqli -> real_escape_string($_POST['email']);
                }
            }
            if (empty($_POST['password'])) {
                $errors[] = "Please enter a password";
                }
            else {$password = $_POST['password'];
                } 
                //If there are no errors
                if(empty($errors)){
                    //encrypt the password
                    $encrypted_txt = encrypt_decrypt('encrypt', $password);
                    //$decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);
                    $sql = "INSERT INTO Users (password, email, first_name, last_name) VALUES ('$encrypted_txt', '$_POST[email]', '$_POST[first_name]', '$_POST[last_name]')";
                    if (!mysqli_query($con, $sql)) {
                        die('Error: ' . mysqli_error($con));
                        }
                        else {
                            echo "Account created";
                        }
                    }
                
                
                mysql_close($con);

            ?>
</div>            
</div>
</div>