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

    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");


    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        //encrypt the password
        $encrypted_txt = encrypt_decrypt('encrypt', $password);
        //$decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);
        $sql = "INSERT INTO Users (password, email, first_name, last_name, verified) VALUES ('$encrypted_txt', '$_POST[email]', '$_POST[first_name]', '$_POST[last_name]', '0')";
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }
        else {
            //echo "Account created";
            header("Location: login.php");   //Redirects to login page
        }
    }            
    mysql_close($con);
?>
                    
<html>
<head>

<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

<div class="col-md-6 col-md-offset-3 top2">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" accept-charset="utf-8" class="form" role="form" onsubmit ="return validate(this)">   <legend>Sign Up</legend>
                    <h4></h4>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="first_name" value="" class="form-control input-lg" placeholder="First Name"  />           
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="last_name" value="" class="form-control input-lg" placeholder="Last Name"  />
                        </div>
                    </div>

                    
                    <!-- <input type="email" name="email" class="form-control input-lg" placeholder="Your Email" required/> -->

                    <input type="password" name="password" class="form-control input-lg" placeholder="Password" required/>
                    <input type="password" name="confirm" class="form-control input-lg" placeholder="Confirm Password" required/>
                    <div class="input-group at-midd">
                        <input type="text" name="email" class="form-control input-lg" maxlength="" placeholder="Email" required/>
                        <span class="input-group-addon">@middlebury.edu</span>
                    </div>
                    <button class="btn btn-primary " type="submit" name = "submit">Create my account</button>
            </form>          
          </div>

        </div>            
    </div>
</div>
</body>

<!-- Script to check is passwords match and email is middlebury -->
<script language="javascript">
function validate(form) {
var e = form.elements;
var middCheck = e['email'].value;
var middValue = middCheck.search("@");

/* Your validation code. */
if(middCheck.substr(middValue) != "@middlebury.edu") {
alert('Please enter a Middlebury email!');
return false;
}

if(e['password'].value != e['confirm'].value) {
alert('Your passwords do not match!');
return false;
}
return true;
}

</script>

<html>