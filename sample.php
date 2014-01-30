<?php session_start(); ?>

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
        <legend>Sample</legend>
            <div class="row">
                <div class="col-md-3 search-form">
                    <h3>Search by:</h3>
                    <form class="" role="search" action="results.php">
                        <div class="form-group">
                            <input name = "creator" type="text" class="form-control" placeholder="Creator's Name..."/>
                        
                            <button name ="search" type="submit" class="btn btn-primary" style="float:right;">Search...</button>
                        </div>
                        
                    </form>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Event's Title...">
                        </div>
                        <button type="submit" class="btn btn-primary">Search...</button>
                    </form>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Location of Event...">
                        </div>
                        <button type="submit" class="btn btn-primary">Search...</button>
                    </form>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd">
                        </div>
                        <button type="submit" class="btn btn-primary">Search...</button>
                    </form>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="tag1 tag2 tag3 tag4...">
                        </div>
                        <button type="submit" class="btn btn-primary">Search...</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>