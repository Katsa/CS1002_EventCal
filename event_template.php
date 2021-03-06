<?php session_start();

    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
?>

<html>
<head>
    
<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <?php
    $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time FROM Events WHERE eventid='$_GET[id]'";
    $sql2 = "SELECT U.first_name, U.last_name, U.email FROM CREATED_BY C, Users U WHERE C.eventid ='$_GET[id]' AND C.email=U.email";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);
    }
    $data = mysqli_fetch_array($result);
    $creator = mysqli_fetch_array($result2);


        ?>
    <div class="container top">
        <div>
            <legend class="top title"><?php echo "$data[title]";?></legend>
           
            <?php 
                if ($creator[email] == $_SESSION['email'] || $_SESSION['admin'] == '1') {
                    echo '<div> <a href="edit_event.php?id=' . $_GET[id] . '" class="btn btn-primary ">Edit</a> <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"> Delete </button> </div>';
                }
            ?>
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

                    <button type="button" class="btn btn-danger" onclick="location.href='delete.php?id=<?php echo $_GET[id]; ?>'">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
               
            <div class="creator">
                <h4>By: <?php echo "$creator[first_name] $creator[last_name]"; ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="time col-xs-5">
                <h4>Start Date: <?php $date = new DateTime($data[start_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[start_time])); ?></h4>
                <h4>End Date: <?php $date = new DateTime($data[end_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[end_time])); ?></h4>  
            </div>
            <div class ="location">
                <h4>Location: <?php echo "$data[location]";?></h4>
            </div>
        </div>
        <div class="desc">
            <h4>Description: </h4>
            <div class="descr"><?php echo "$data[description]";?></div>
        </div>
    </div>
       
        
</body>
</html><?php session_start();

    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
?>

<html>
<head>
    
<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <?php
    $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time FROM Events WHERE eventid='$_GET[id]'";
    $sql2 = "SELECT U.first_name, U.last_name, U.email FROM CREATED_BY C, Users U WHERE C.eventid ='$_GET[id]' AND C.email=U.email";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);
    }
    $data = mysqli_fetch_array($result);
    $creator = mysqli_fetch_array($result2);


        ?>
    <div class="container top">
        <div>
            <legend class="top title"><?php echo "$data[title]";?></legend>
           
            <?php 
                if ($creator[email] == $_SESSION['email'] || $_SESSION['admin'] == '1') {
                    echo '<div> <a href="edit_event.php?id=' . $_GET[id] . '" class="btn btn-primary ">Edit</a> <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"> Delete </button> </div>';
                }
            ?>
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

                    <button type="button" class="btn btn-danger" onclick="location.href='delete_user.php?id=<?php echo $_GET[id]; ?>'">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
               
            <div class="creator">
                <h4>By: <?php echo "$creator[first_name] $creator[last_name]"; ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="time col-xs-5">
                <h4>Start Date: <?php $date = new DateTime($data[start_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[start_time])); ?></h4>
                <h4>End Date: <?php $date = new DateTime($data[end_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[end_time])); ?></h4>  
            </div>
            <div class ="location">
                <h4>Location: <?php echo "$data[location]";?></h4>
            </div>
        </div>
        <div class="desc">
            <h4>Description: </h4>
            <div class="descr"><?php echo "$data[description]";?></div>
        </div>
    </div>
       
        
</body>
</html><?php session_start();

    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
?>

<html>
<head>
    
<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <?php
    $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time FROM Events WHERE eventid='$_GET[id]'";
    $sql2 = "SELECT U.first_name, U.last_name, U.email FROM CREATED_BY C, Users U WHERE C.eventid ='$_GET[id]' AND C.email=U.email";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);
    }
    $data = mysqli_fetch_array($result);
    $creator = mysqli_fetch_array($result2);


        ?>
    <div class="container top">
        <div>
            <legend class="top title"><?php echo "$data[title]";?></legend>
           
            <?php 
                if ($creator[email] == $_SESSION['email'] || $_SESSION['admin'] == '1') {
                    echo '<div> <a href="edit_event.php?id=' . $_GET[id] . '" class="btn btn-primary ">Edit</a> <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"> Delete </button> </div>';
                }
            ?>
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

                    <button type="button" class="btn btn-danger" onclick="location.href='delete_user.php?id=<?php echo $_GET[id]; ?>'">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
               
            <div class="creator">
                <h4>By: <?php echo "$creator[first_name] $creator[last_name]"; ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="time col-xs-5">
                <h4>Start Date: <?php $date = new DateTime($data[start_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[start_time])); ?></h4>
                <h4>End Date: <?php $date = new DateTime($data[end_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[end_time])); ?></h4>  
            </div>
            <div class ="location">
                <h4>Location: <?php echo "$data[location]";?></h4>
            </div>
        </div>
        <div class="desc">
            <h4>Description: </h4>
            <div class="descr"><?php echo "$data[description]";?></div>
        </div>
    </div>
       
        
</body>
</html><?php session_start();

    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
?>

<html>
<head>
    
<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <?php
    $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time FROM Events WHERE eventid='$_GET[id]'";
    $sql2 = "SELECT U.first_name, U.last_name, U.email FROM CREATED_BY C, Users U WHERE C.eventid ='$_GET[id]' AND C.email=U.email";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);
    }
    $data = mysqli_fetch_array($result);
    $creator = mysqli_fetch_array($result2);


        ?>
    <div class="container top">
        <div>
            <legend class="top title"><?php echo "$data[title]";?></legend>
           
            <?php 
                if ($creator[email] == $_SESSION['email'] || $_SESSION['admin'] == '1') {
                    echo '<div> <a href="edit_event.php?id=' . $_GET[id] . '" class="btn btn-primary ">Edit</a> <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"> Delete </button> </div>';
                }
            ?>
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

                    <button type="button" class="btn btn-danger" onclick="location.href='delete_user.php?id=<?php echo $_GET[id]; ?>'">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
               
            <div class="creator">
                <h4>By: <?php echo "$creator[first_name] $creator[last_name]"; ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="time col-xs-5">
                <h4>Start Date: <?php $date = new DateTime($data[start_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[start_time])); ?></h4>
                <h4>End Date: <?php $date = new DateTime($data[end_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[end_time])); ?></h4>  
            </div>
            <div class ="location">
                <h4>Location: <?php echo "$data[location]";?></h4>
            </div>
        </div>
        <div class="desc">
            <h4>Description: </h4>
            <div class="descr"><?php echo "$data[description]";?></div>
        </div>
    </div>
       
        
</body>
</html><?php session_start();

    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
?>

<html>
<head>
    
<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <?php
    $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time FROM Events WHERE eventid='$_GET[id]'";
    $sql2 = "SELECT U.first_name, U.last_name, U.email FROM CREATED_BY C, Users U WHERE C.eventid ='$_GET[id]' AND C.email=U.email";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);
    }
    $data = mysqli_fetch_array($result);
    $creator = mysqli_fetch_array($result2);


        ?>
    <div class="container top">
        <div>
            <legend class="top title"><?php echo "$data[title]";?></legend>
           
            <?php 
                if ($creator[email] == $_SESSION['email'] || $_SESSION['admin'] == '1') {
                    echo '<div> <a href="edit_event.php?id=' . $_GET[id] . '" class="btn btn-primary ">Edit</a> <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"> Delete </button> </div>';
                }
            ?>
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

                    <button type="button" class="btn btn-danger" onclick="location.href='delete_event.php?id=<?php echo $_GET[id]; ?>'">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
               
            <div class="creator">
                <h4>By: <?php echo "$creator[first_name] $creator[last_name]"; ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="time col-xs-5">
                <h4>Start Date: <?php $date = new DateTime($data[start_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[start_time])); ?></h4>
                <h4>End Date: <?php $date = new DateTime($data[end_date]); echo date_format($date, 'F j, Y'); echo ", "; echo date("g:i a", strtotime($data[end_time])); ?></h4>  
            </div>
            <div class ="location">
                <h4>Location: <?php echo "$data[location]";?></h4>
            </div>
        </div>
        <div class="desc">
            <h4>Description: </h4>
            <div class="descr"><?php echo "$data[description]";?></div>
        </div>
    </div>
       
        
</body>
</html>