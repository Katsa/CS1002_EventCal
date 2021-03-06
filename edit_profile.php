<?php session_start();
    
    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
?>

<html>
<head>

<?php 
    include 'include/header.php'; 

    $sql = "SELECT first_name, last_name, email From Users Where email= '$_SESSION[email]'";
    $sql2 = "SELECT C.email, C.eventid FROM CREATED_BY C, Users U WHERE C.email = U.email";

     if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);
    }
    $data = mysqli_fetch_array($result);

    ?>
    <link rel="stylesheet" type="text/css" href="css/sample.css">

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <div class="container top" id="wrap">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="edit.php" method="post" accept-charset="utf-8" class="form" role="form">  
                    <div class= "row"> 
                        <legend>Edit Profile</legend>
                    </div>
                    <div class="col-md-9 row">
                        <div class="row span4">
                            <h4 > First Name: <input type="text" name="event_name" value="<?php echo "$data[first_name]";?>" class=" input-sm"/></h4>
                            <h4 > Last Name: <input type="text" name="event_name" value="<?php echo "$data[last_name]";?>" class=" input-sm"/></h4>
                                               
                            <br>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                  Delete
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Warning!</h4>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure you want to delete your account?
                                  </div>
                                  <div class="modal-footer">

                                    <button type="button" class="btn btn-danger" onclick="location.href='delete_user.php?id=<?php echo $_SESSION[email]; ?>'">Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <br>
                            
                            <br>
                            <a href="profile.php" class="btn btn-primary btn-primary">Submit Changes</a> <!-- Does not save the edits -->
                                                          <!-- Does not delete the profile -->
                            <a href="profile.php" class="btn btn-warning">Back</a>
                        </div>
                        
                    
                        <br>
                    </div>
                    <div>
                        <a href="" class="btn btn-primary">Change Password</a>
                    </div>
                </form>          
            </div>
        </div>            
    </div>

</body>                                                                                                                                                                                                         