<html>
<body>

<form  method = "post" action = "insert.php">

	Event Name: <input type = "text" name = "event_name" required><br>
	Location: <input type = "text" name = "location" required><br>
	Start Time: <input type = "datetime-local" name = "start_time" required> <br>
	End Time: <input type = "datetime-local" name = "end_time" required> <br>
	Description: <textarea name = "description" rows = "5" cols="40"></textarea><br>
	<!-- <input type="text" name = "approved"> <br> -->
	<input type = "submit" value = "Submit"><br>

</form>




</body>
</html>