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
                $sql = "SELECT password, email, first_name, last_name, admin, verified FROM Users WHERE email = '$email';";

                if (!mysqli_query($con, $sql)) {
                        die('Error: ' . mysqli_error($con));
                }
                else {
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                }
                $fetchedpass = $row[password];
            $decrypted_txt = encrypt_decrypt('decrypt', $fetchedpass);
               if ($decrypted_txt === $password) {
            if ($row[verified] == '0') {
                header("Location: login_notver.php");
            }
            else {
                session_start();
                        $_SESSION["email"] = $row[email];
                        $_SESSION["name"] = $row[first_name] . " " . $row[last_name];
                        $_SESSION["admin"] = $row[admin];
                header("Location: main.php");   //Redirects to main page
                    }
        }
            else { //fix placement
                header("Location: login_failed.php");
                }
        }

        mysql_close($con)

?>
<html>

<head>
<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <div class="col-md-6 col-md-offset-3 top">
        <form action = "login_failed.php" method="post" accept-charset="utf-8" class="form" role="form">   
            <legend>Login Failed</legend>
                <div class="error-border">
                    <div class="error-msg">
                        <div class="error-head">
                            Please re-enter your password
                        </div>
                        <div class="error-txt">
                            <p>The login information you have entered is incorrect. Please try again.</p>
                            <p>Did you forget your password? <a href="#">Reset it here!</a></p>
                        </div>
                    </div>
                    <div class="row login-info">
                        <div class="span4">
                            <input type="email" name="email" value="" class=" input-lg" placeholder="Email" required/>
                        </div>
                        <div class="">
                            <input type="password" name="password" value="" class=" input-lg" placeholder="Password"  required/>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="login-btn">
                        <div class="row">
                            <button class="btn btn-primary" type="submit" name= "submit">Login</button>
                            <a href="signup.php" class="btn btn-primary ">Sign Up</a>
                        </div>
                        <br>
                        <div class="forgot-pass">
                            <a href="#" class"forgot_password">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </form>          
        </div>
            </div> 

	</body>
</html>

