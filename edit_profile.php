<?php session_start();
    
     define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
?>

<html>
<head>

<?php include 'include/header.php'; 

    $sql = "SELECT first_name, last_name, email From Users Where email='$_GET[usr]'";
    $sql2 = "SELECT C.email, C.eventid FROM CREATED_BY C, Users U WHERE C.email = U.email";

     if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);
    }
    $data = mysqli_fetch_array($result);
    $events = mysqli_fetch_array($result2);

    ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <div class="container top" id="wrap">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="edit.php" method="post" accept-charset="utf-8" class="form" role="form">   
                    <legend>Edit Profile</legend>
                    <h4></h4>
                    <div class="row">
                        <div class="col-md-6 row">
                            <p class="edit-prof">First Name: 
                            <input type="text" name="event_name" value="<?php echo "$data[first_name]";?>" class=" input-sm"/>
                            </p>       
                        </div>
                        <div class="row">
                        <div class="col-md-6 row">
                            <p class="edit-prof">Last Name: 
                            <input type="text" name="event_name" value="b<?php echo "$data[last_name]";?>" class=" input-sm"/>
                            </p>       
                        </div>
                    </div>
                    <div>
                        <a href="" class="btn btn-primary">Change Password</a>
                        <a href="profile.php" class="btn btn-warning">Back</a>
                    </div>
                     <br>
                        <a href="profile.php" class="btn btn-primary btn-primary">Submit Changes</a> <!-- Does not save the edits -->
                        <a href="#" class="btn btn-danger ">Delete</a>                               <!-- Does not delete the profile -->
                    </div>
                </form>          
            </div>
        </div>            
    </div>

</body>