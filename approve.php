<html>
<?php   
    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
    
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

    $sql = "SELECT title, location, start_time, start_date, end_time, end_date, edit, description FROM Events WHERE waiting_for_approval = '0'";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error());
    }
    else {
        //execute the SQL query
        $result = mysqli_query($con, $sql);
    }    
?>

<head>
    <style>
    table { width:50%; }
    </style>

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
                <a class="navbar-brand" href="main.html">MiddLife</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="create_event.html">Create an Event</a>
                    </li>
                    <li><a href="search.html">Search</a>
                    </li>
                    <li><a href="login.html" class="btn-login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
<br><br><br>
    <div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th nowrap>New Event/Edit</th>
            <th >Description</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php while($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td> <?php echo "$row[title]"; ?> </td>
                <td> <?php echo "$row[location]"; ?> </td>
                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", "$row[start_time]"); ?> </td>
                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", "$row[end_time]"); ?> </td>
                <td> <?php if ($row[edit] == 1) { echo "New Event"; } else { echo "Edit"; } ?>
                <td> <?php echo "$row[description]"; ?> </td>
                <td nowrap class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Approve</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
            </tr>
            <?php } mysql_close($con); ?>
    </table>
    </div>
</div>

</body>
</html>