<?php
require_once "pdo.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<h4>
		Select day and time for which you want to see faculty availability
		</h4>
		<br>

		<h4>Day</h4>
		<input type="radio" name="day" value="Monday"><br>
    	<input type="radio" name="day" value="Tuesday" checked><br>
    	<input type="radio" name="day" value="Wednesday"><br>
    	<input type="radio" name="day" value="Thursday"><br>
    	<input type="radio" name="day" value="Friday"><br>

		<h4>Time</h4>
		<input type="radio" name="when" value="9.00-10.00"><br>
    	<input type="radio" name="when" value="10.00-11.00" checked><br>
    	<input type="radio" name="when" value="11.15-12.15"><br>
    	<input type="radio" name="when" value="12.15-13.15"><br>
    	<input type="radio" name="when" value="13.45-14.45"><br>
    	<input type="radio" name="when" value="14.45-15.45"><br>
    	<input type="radio" name="when" value="15.45-16.45"><br>
	</form>

</body>
</html>
