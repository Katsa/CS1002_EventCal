<?php session_start(); ?>
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

<SCRIPT LANGUAGE="javascript">
function validate() {
	fm = document.thisForm

	//use validation here to make sure the user entered the information correctly
	fm.submit()
}
</SCRIPT>
<div class="top">
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
                <li>
                	<a href="search.php">Search</a>
                </li>    
                <?php  
                    if($_SESSION["email"] != "") {
                        echo '<li> <a href="create_event.php">Create an Event</a> </li> <li><a href = "logout.php">Logout</a></li>';
                    }
                    else {
                        echo '<li><a href="login.php" class="btn-login login">Login</a> </li>';
                    }
                    if ($_SESSION["admin"] == "1") {
                        echo '<li><a href="approve.php">Approve</a> </li>';
                    }
                ?>
                </ul>
            </div>
         <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
   </nav>
</div>
<br>

<div class="container">
  	<legend>Advanced Search</legend>
    	<div class="row">
      		<div class="col-md-6 col-md-offset-3">
        		<!-- Nav tabs category -->
		        <ul class="nav nav-tabs faq-cat-tabs">
		            <li class="active"><a href="#faq-cat-1" data-toggle="tab">By Creator</a></li>
		            <li><a href="#faq-cat-2" data-toggle="tab">By Title</a></li>
		            <li><a href="#faq-cat-3" data-toggle="tab">By Location</a></li>
		            <li><a href="#faq-cat-4" data-toggle="tab">By Start Date</a></li>
		            <li><a href="#faq-cat-5" data-toggle="tab">By Tags</a></li>
		        </ul>

        <!-- Tab panes -->
        <div class="tab-content faq-cat-content">

        	<!-- panel 1 -->
        	<div class="tab-pane active in fade" id="faq-cat-1">
            	<div class="panel-group" id="accordion-cat-1">
              		<form class="navbar-form navbar-left" role="search">
                		<div class="form-group">
                  			<input type="text" class="form-control" placeholder="Creator's Name">
                		</div>
                		<button type="submit" class="btn btn-primary">Search</button>
              		</form>
            	</div>
          	</div>

          			<!-- panel 2 -->
                    <div class="tab-pane fade" id="faq-cat-2">
                        <div class="panel-group" id="accordion-cat-2">
                            <div class="row">
                                <!-- <select class="multiselect" multiple="multiple">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
                                </select> -->
                                <form class="navbar-form " role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Title of Event">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- panel 3 -->
                    <div class="tab-pane fade" id="faq-cat-3">
                        <div class="panel-group" id="accordion-cat-3">
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Location's Name">
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>

                    <!-- panel 4 -->
                    <div class="tab-pane fade" id="faq-cat-4">
                        <div class="panel-group" id="accordion-cat-4">
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="yyyy-mm-dd">
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>

                    <!-- panel 5 -->
                    <div class="tab-pane fade" id="faq-cat-5">
                        <div class="panel-group" id="accordion-cat-5">
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="tag1, tag2, tag3, ...">
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!--
  <li>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                 </form>
               </li>
               -->