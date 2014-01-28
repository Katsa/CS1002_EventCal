<html>
<head>

<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

    <div class="container top" id="wrap">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="edit.php" method="post" accept-charset="utf-8" class="form" role="form">   <legend>Edit Profile</legend>
                    <h4></h4>
                    <?php

                        $sql = "SELECT first_name, last_name, email FROM Users WHERE " 
                    ?>
                    <div class="row">
                        <div class="col-xs-6 col-md-6 row">
                            <h5 class="">First Name: George</h5>
                            <h5 class="first-name"></h5>   <!-- This is where the first name will go -->       
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <h5 class="last-name">Last Name: Katsaounis</h5> <!-- This is where the last name will go -->
                            <h5></h5>
                        </div>
                    </div>
                    <h5>Email:</h5>
                    <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  />
                    <input type="password" name="confirm" value="" class="form-control input-lg" placeholder="Confirm Password"  />
                    <h4>Organisazions Stared:</h4>
                    <button class="btn btn-primary" type="submit">Submit Changes</button>
                </form>          
            </div>
        </div>            
    </div>

</body>