<?php session_start();
    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");
    $now = date('Y-m-d');
    $nextWeek = date('Y-m-d', strtotime('+6 day'));
    $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time FROM Events WHERE waiting_for_approval = '0' AND start_date BETWEEN '$now' AND '$nextWeek' ORDER BY start_date ASC, start_time ASC";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        $result = mysqli_query($con, $sql);
    }
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MiddLife</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/full-slider.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/signupP.css" />


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
                            <a href="search.php">Advanced Search</a>
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
        <!-- /.container -->
    </nav>

    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y');?></h1>
                </div>
                <div class ="main">
                    <div class="container">
                        <table class="table custab">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                            <?php

                            $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time, eventid FROM Events WHERE waiting_for_approval = '0' AND start_date <= '$now' AND '$now' <= end_date ORDER BY start_time ASC";
                                if (!mysqli_query($con, $sql)) {
                                    die('Error: ' . mysqli_error($con));
                                }
                                else {
                                    $result = mysqli_query($con, $sql);
                                }

                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 150) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+1 day'));?></h1>
                </div>
                <div class ="main">
                    <div class="container">
                        <table class="table custab">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                            <?php

                            $date = date('Y-m-d', strtotime('+1 day'));
                            $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time, eventid FROM Events WHERE waiting_for_approval = '0' AND start_date <= '$date' AND '$date' <= end_date ORDER BY start_time ASC";
                                if (!mysqli_query($con, $sql)) {
                                    die('Error: ' . mysqli_error($con));
                                }
                                else {
                                    $result = mysqli_query($con, $sql);
                                }

                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 150) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+2 day'));?></h1>
                </div>
                <div class ="main">
                    <div class="container">
                        <table class="table custab">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                            <?php

                            $date = date('Y-m-d', strtotime('+2 day'));
                            $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time, eventid FROM Events WHERE waiting_for_approval = '0' AND start_date <= '$date' AND '$date' <= end_date ORDER BY start_time ASC";
                                if (!mysqli_query($con, $sql)) {
                                    die('Error: ' . mysqli_error($con));
                                }
                                else {
                                    $result = mysqli_query($con, $sql);
                                }

                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 150) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+3 day'));?></h1>
                </div>
                <div class ="main">
                    <div class="container">
                        <table class="table custab">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                            <?php

                            $date = date('Y-m-d', strtotime('+3 day'));
                            $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time, eventid FROM Events WHERE waiting_for_approval = '0' AND start_date <= '$date' AND '$date' <= end_date ORDER BY start_time ASC";
                                if (!mysqli_query($con, $sql)) {
                                    die('Error: ' . mysqli_error($con));
                                }
                                else {
                                    $result = mysqli_query($con, $sql);
                                }

                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 150) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+4 day'));?></h1>
                </div>
                <div class ="main">
                    <div class="container">
                        <table class="table custab">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                            <?php

                            $date = date('Y-m-d', strtotime('4 day'));
                            $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time, eventid FROM Events WHERE waiting_for_approval = '0' AND start_date <= '$date' AND '$date' <= end_date ORDER BY start_time ASC";
                                if (!mysqli_query($con, $sql)) {
                                    die('Error: ' . mysqli_error($con));
                                }
                                else {
                                    $result = mysqli_query($con, $sql);
                                }

                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 150) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+5 day'));?></h1>
                </div>
                <div class ="main">
                    <div class="container">
                        <table class="table custab">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                            <?php

                            $date = date('Y-m-d', strtotime('+ day'));
                            $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time, eventid FROM Events WHERE waiting_for_approval = '0' AND start_date <= '$date' AND '$date' <= end_date ORDER BY start_time ASC";
                                if (!mysqli_query($con, $sql)) {
                                    die('Error: ' . mysqli_error($con));
                                }
                                else {
                                    $result = mysqli_query($con, $sql);
                                }

                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 150) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+6 day'));?></h1>
                </div>
                <div class ="main">
                    <div class="container">
                        <table class="table custab">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                            <?php

                            $date = date('Y-m-d', strtotime('+6 day'));
                            $sql = "SELECT title, location, start_date, end_date, description, start_time, end_time, eventid FROM Events WHERE waiting_for_approval = '0' AND start_date <= '$date' AND '$date' <= end_date ORDER BY start_time ASC";
                                if (!mysqli_query($con, $sql)) {
                                    die('Error: ' . mysqli_error($con));
                                }
                                else {
                                    $result = mysqli_query($con, $sql);
                                }

                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 150) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 0000 //changes the speed
    })
    </script>



</body>

</html>
