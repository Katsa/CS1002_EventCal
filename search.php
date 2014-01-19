<html>
<body>
<SCRIPT LANGUAGE="javascript">
function validate() {
	fm = document.thisForm

	//use validation here to make sure the user entered the information correctly
	fm.submit()
}
</SCRIPT>

	<form name="thisForm" method="POST" action="display.php">
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
</body>
</html>