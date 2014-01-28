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

<?php include 'include/header.php'; ?>

</head>

<body>

<?php include 'include/navbar.php'; ?>

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
                <div class = "fill" style = "background-image:url(http://sga.middlebury.edu/storage/Vermont%20Autumn.jpg?__SQUARESPACE_CACHEVERSION=1346190366820);">
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
                            <tr onclick="document.location = 'event_template.php?id= <?php echo $row[eventid]; ?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 140) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>

                    </div>
                </div>
            </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+1 day'));?></h1>
                </div>
                <div class = "fill" style = "background-image:url(http://4.bp.blogspot.com/-v92B3iZ1MXg/UgzwAge-ThI/AAAAAAAADrY/wgfoLW3-uzE/s1600/IMG_0862.JPG);">
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
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]; ?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 140) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            </div>
            <div class="item">yle.background='white';" 
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+2 day'));?></h1>
                </div>
                <div class = "fill" style = "background-image:url(http://community.middlebury.edu/~rlange/images/background.jpg);">
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
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]; ?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 140) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+3 day'));?></h1>
                </div>
                <div class = "fill" style = "background-image:url(http://moon.com/wp-content/uploads/2013/09/ScenicAutumnDrive_snehit_123rf_1600.jpg);">
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
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]; ?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 140) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+4 day'));?></h1>
                </div>
                <div class = "fill" style = "background-image:url(http://askhiba.files.wordpress.com/2008/08/bihall.jpg);">
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
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]; ?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 140) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+5 day'));?></h1>
                </div>
                <div class = "fill" style = "background-image:url(http://upload.wikimedia.org/wikipedia/commons/c/c9/Middlebury_VT_-_Middlebury_Falls.jpg);">
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
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]; ?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 140) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            </div>
            <div class="item">
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y', strtotime('+6 day'));?></h1>
                </div>
                <div class = "fill" style = "background-image:url(http://farm4.staticflickr.com/3582/3330264723_56d247ba0e_o.jpg);">
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
                            <tr onclick="document.location = 'event_template.php?id=<?php echo $row[eventid]; ?>';" onmouseout="this.style.background='white';" onmouseover="this.style.background='gray';this.style.cursor='pointer'">
                                <td class = "title"> <?php echo "$row[title]"; ?> </td>
                                <td class = "title"> <?php echo "$row[location]"; ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
                                <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
                                <td class = "desc"> <?php $str = $row[description]; if (strlen($str) > 140) $str = substr($str, 0, 140) . "..."; echo $str; ?> </td>
                            </tr>
                            <?php } ?>

                        </table>
                    </div>
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

</body>

</html>
