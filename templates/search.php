<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/css/signupP.css" />
    <link href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<SCRIPT LANGUAGE="javascript">
function validate() {
	fm = document.thisForm

	//use validation here to make sure the user entered the information correctly
	fm.submit()
}
</SCRIPT>
<div>
	<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/main.html">MiddLife</a>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
               <li>
                  <a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/templates/create_event.html">Create an Event</a>
               </li>
               <li>
                  <a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/templates/search.php">Search</a>
               </li>
               <li>
                  <a href="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/templates/loginpage.php" class="btn-login">Login</a>
               </li>
            </ul>
         </div>
         <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
   </nav>
</div>
<div class="top">
   <form name="thisForm" method="POST" action="http://www.cs.middlebury.edu/~gkatsaounis/CS1002_EventCal/display.php">
      <p>Select what you would like to search by: <select size="2" name="my_dropdown">
         <option value="eventid">Event ID</option>
         <option value="title">event_title</option>
         <option value="location">location</option>
      </select>
      </p>
      <p>
         <input type="button" value="Submit" name="btm_submit" onclick="validate()">
      </p>
   </form> 
</div>
</body>
</html>

<!-- 
   -->

   <!-- 
   <ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
  <li><a href="#profile" data-toggle="tab">Profile</a></li>
  <li><a href="#messages" data-toggle="tab">Messages</a></li>
  <li><a href="#settings" data-toggle="tab">Settings</a></li>
</ul>
   <div class="tab-content">
     <div class="tab-pane face in active" id="home">.1..</div>
     <div class="tab-pane fade" id="profile">..2.</div>
     <div class="tab-pane fade" id="messages">.3..</div>
     <div class="tab-pane fade" id="settings">.4..</div>
   </div>
   <script>
      $(function () {
         $('#myTab a:last').tab('show')
      })
      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
         e.target // activated tab
         e.relatedTarget // previous tab
      })
      </script>
   -->
