<?php session_start();

if(!isset($_SESSION['admin']) || (isset($_SESSION['admin']) && $_SESSION['admin'] !== '1'))
{
   die('You cannot directly access this page!'); // kill the page display error
}
    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
    
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

    //if submission
    if (isset($_POST[id])) {
        $event_id = substr($_POST[id], 1);

        //if approve
        if (substr($_POST[id], 0, 1) == 1) {
            $sql = "SELECT original_version FROM Events WHERE eventid = $event_id;";
            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error());
            }
            else {
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
            }

            //if edit
            if ($row[original_version] != 0) {
                $sql = "DELETE FROM Events WHERE eventid = $row[original_version];";
                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error());
                }
                else {
                    mysqli_query($con, $sql);
                }
            }
            $sql = "UPDATE Events SET waiting_for_approval = 0 WHERE eventid = $event_id;";
        }

        //if delete
        else
            $sql = "DELETE FROM Events WHERE eventid = $event_id;";
        
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error());
        }
        else {
            mysqli_query($con, $sql);
        }    
    }

    //get data for table
    $sql = "SELECT title, location, start_time, start_date, end_time, end_date, edit, description, eventid FROM Events WHERE waiting_for_approval = '1'";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error());
    }
    else {
        $result = mysqli_query($con, $sql);
    }
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
    </nav>
<br><br><br>
    <div class="container">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Created By</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th nowrap>New Event/Edit</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
        <?php while($row = mysqli_fetch_array($result)) { //loop over each event

            //get data from created_by
            $sql = "SELECT email, time_of_creation FROM CREATED_BY WHERE eventid = '$row[eventid]';";

            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error());
            }
            else {
                $created = mysqli_query($con, $sql);
                $createdi = mysqli_fetch_array($created);
            }

            //get data from users
            $sql = "SELECT first_name, last_name FROM Users WHERE email = '$createdi[email]';";
            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error());
            }
            else {
                $user = mysqli_query($con, $sql);
                $useri = mysqli_fetch_array($user);
            }
        ?>
        <tr>
            <td class = "title"> <?php echo "$row[title]"; ?> </td>
            <td class = "title"> <?php echo "$row[location]"; ?> </td>
            <td nowrap> <?php echo "$useri[first_name] $useri[last_name] <br> $createdi[email]"; ?> </td>
            <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
            <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
            <td> <?php if ($row[edit] == 0) { echo "New Event"; } else { echo "Edit"; } ?>
            <td class = "desc"> <?php echo "$row[description]"; ?> </td>
            <td nowrap class="text-center">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <button class='btn btn-info btn-xs' type="submit" value= <?php echo "1$row[eventid]" ?> name="id"><span class="glyphicon glyphicon-edit"></span> Approve</a>
                    <button class="btn btn-danger btn-xs" type="submit" value= <?php echo "0$row[eventid]" ?> name="id"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                </form>
            </td>
        </tr>
        <?php } mysql_close($con); ?>
    </table>
</div>

</body>
</html>