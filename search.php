<?php session_start();

    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
        
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

    if (isset($_GET[search])) {
        $sql = "SELECT E.*, U.* FROM Events E, CREATED_BY C, Users U WHERE (U.first_name LIKE '%$_GET[creator]%' OR U.last_name LIKE '%$_GET[creator]%') AND (E.title LIKE '%$_GET[title]%') AND(E.location LIKE '%$_GET[location]%') AND (E.start_date LIKE '%$_GET[start_date]%') AND (E.tags LIKE '%$_GET[tags]%')AND U.email = C.email AND C.eventid = E.eventid";
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }
        else {
            $result = mysqli_query($con, $sql);
        }
    }
 ?>
<html>
<head>
   <?php 
    include 'include/header.php'; 
    ?>
     <link rel="stylesheet" type="text/css" href="css/sample.css">

</head>

<body>
    <?php include 'include/navbar.php'; ?>

    <div class="container top">
        <legend>Search</legend>
            <div class="row">
                <div class="col-md-3 search-form steady">
                    <h3>Search by:</h3>

                    <form name = "search" method = "GET" class="navbar-form navbar-left" role="search" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group marg">
                            <input name = "creator" type="text" class="form-control" placeholder="Creator's Name..." value = <?php echo $_GET['creator']; ?>>
                        </div>

                        <br>

                        <div class="form-group marg">
                            <input name = "title" type="text" class="form-control" placeholder="Event's Title..." value = <?php echo $_GET['title']; ?>>
                        </div>
                        <br>

                        <div class="form-group marg">
                            <input name = "location" type="text" class="form-control" placeholder="Location of Event..." value = <?php echo $_GET['location']; ?>>
                        </div>
                        <br>
                        <div class="form-group marg">
                            <input name = "start_date" type="date" class="form-control" placeholder="yyyy-mm-dd" value = <?php echo $_GET['start_date']; ?>>
                        </div>
                        <br>   
                        <div class="form-group marg">
                            <input name = "tags" type="text" class="form-control" placeholder="tag1 tag2 tag3 tag4..." value = <?php echo $_GET['tags']; ?>>
                        </div>
                        <div>
                            <button name = "search" type="submit" class="btn btn-primary">Search...</button>
                        </div>
                    </form>
            </div>


            <div class="col-md-8 col-md-offset-4 box">
                <h3 class="box-header" id ="">Results:</h3>
                <div class="box-body">
                    <?php
                    while($row = mysqli_fetch_array($result)) { ?>
                    <ul>
                        <h4><a href = "event_template.php?id=<?php echo $row[eventid]?>"><?php echo $row['title'] ?></a></h4>
                        <p>
                            <div>By: <?php echo $row[first_name] . " " . $row[last_name];?></div>
                            <div>On <?php echo date('F j, Y \a\t g:i a', strtotime($row[start_date])) . " to " . date('F j, Y \a\t g:i a', strtotime($row['end_date'])) ?></div>
                            <div>Tags: <?php echo $row[tags]?></div>
                        </p>
                        <br>
                    </ul>
                    <?php
                        
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>