<html>
<body>
<SCRIPT LANGUAGE="javascript">
function validate() {
	fm = document.thiForm

	//use validation here to make sure the user entered the information correctly
	fm.subit()
}
</SCRIPT>

	<form name="search" method="POST" action="display.php">
		<p>Select what you would like to search by: <select size="2" name="my_dropdown">
			<option value="location">Event ID</option>
			<option value="title">Event Title</option>
			<option value="location">Location</option>
		</select>
		</p>
		<p>
			<input type="button" value="Submit" name"btn_submit" onclick="validate()">
		</p>
	</form>
</body>
</html>