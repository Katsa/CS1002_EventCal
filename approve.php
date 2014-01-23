<html>
<?php   
    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
    
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

    //Approves event or Deletes Event if submitted
    if ($_POST[id] != NULL) {
        $event_id = substr($_POST[id], 1);
        if (substr($_POST[id], 0, 1) == 1) {
            $sql = "UPDATE Events SET waiting_for_approval = 1 WHERE eventid = $event_id;";
        }
        else
            $sql = "DELETE FROM Events WHERE eventid = $event_id;";
        
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error());
        }
        else {
            //execute the SQL query
            $result = mysqli_query($con, $sql);
        }    
    }

    $sql = "SELECT title, location, start_time, start_date, end_time, end_date, edit, description, eventid FROM Events WHERE waiting_for_approval = '0'";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error());
    }
    else {
        //execute the SQL query
        $result = mysqli_query($con, $sql);
    }    
?>

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
                    <li>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </li>
                    <li>
                        <a href="search.html">Advanced Search</a>
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
    </nav>
<br><br><br>
    <div class="container">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th nowrap>New Event/Edit</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php while($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", "$row[start_time]"); ?> </td>
                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", "$row[end_time]"); ?> </td>
                <td> <?php if ($row[edit] == 1) { echo "New Event"; } else { echo "Edit"; } ?>
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