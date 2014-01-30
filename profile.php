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
    $sql2 = "SELECT E.title FROM CREATED_BY C, Events E WHERE C.eventid = E.eventid AND C.email = '$_SESSION[email]'";

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
                    <legend>Profile <a class="btn btn-primary pull-right" href="edit_profile.php">Edit</a></legend>
                    
                </div>
                    <div class="col-md-9 row">
                        <div class="col-xs-6 col-md-6 row span4">
                            <h4 > <?php echo "$data[first_name]";?></h4>
                        
                            <h4> <?php echo "$data[last_name]";?></h4> <!-- This is where the last name will go -->
                                               
                        <br>
                        <br>

                        <h5>Email: <?php echo "$data[email]";?></h5>
                        
                        <br>
                        </div>
                        <div class="events">
                            
                            <div class="box box-small">
                                <div class="box-header">
                                      <h4 id="events">Events Created:</h4>
                                </div>
                                <div class="box-body">
                                    <div class"event-body" id="events">
                                    <?php while($row = mysqli_fetch_array($result2)) {
                                        echo "$row[title] <br>";
                                    }?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                    </div>
                </form>          
            </div>
        </div>            
    </div>

</body>