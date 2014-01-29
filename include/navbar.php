<?php
echo
    '<div>
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
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav row">
                        <li class="dropdown">
                        <a href="search.php">Search</a>
                        
                    </li>';
                        if($_SESSION["email"] != "") { //if logged in
                            echo '<li> <a href="create_event.php">Create an Event</a> </li> <li> <a href="profile.php">Profile</a> </li><li><a href = "logout.php">Logout</a></li>';
                        }
                        else { //if not logged in
                            echo '<li><a href="login.php" class="btn-login">Login</a> </li> <li><a href="signup.php">Sign Up</a></li>';
                        }
                        if ($_SESSION["admin"] == "1") { //if admin
                            echo '<li><a href="approve.php">Approve</a> </li>';
                        }
echo                
                    '</ul>
                </div>
                <div class ="right">'; ?>
            <?php if ($_SESSION["email"] != "") { echo "Welcome " . $_SESSION['name'] . "!"; }
echo       
                '</div>
            </div>
        </nav>
    </div>';
?>