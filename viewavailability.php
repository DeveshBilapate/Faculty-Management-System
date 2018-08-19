<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
	<br>
	<a href="homepage.php">go back</a>

	<form method="post" action="view.php">
		<h3>
		Select day and time for which you want to see faculty availability
		</h3>
		<h4>Day</h4>
		<input type="radio" name="day" value="mon" checked>Monday<br>
    	<input type="radio" name="day" value="tue">Tuesday<br>
    	<input type="radio" name="day" value="wed">Wednesday<br>
    	<input type="radio" name="day" value="thu">Thursday<br>
    	<input type="radio" name="day" value="fri">Friday<br>

		<h4>Time</h4>
		<input type="radio" name="when" value="p9to10">9.00-10.00<br>
    	<input type="radio" name="when" value="p10to11" >10.00-11.00<br>
    	<input type="radio" name="when" value="p1115to1215">11.15-12.15<br>
    	<input type="radio" name="when" value="p1215to1315">12.15-13.15<br>
    	<input type="radio" name="when" value="p1345to1445">13.45-14.45<br>
    	<input type="radio" name="when" value="p1445to1545">14.45-15.45<br>
    	<input type="radio" name="when" value="p1545to1645" >15.45-16.45<br>
    	<br>
    	<input type="submit" name="availability" value="Submit"/>
    	<br>
	</form>
    <br>
	<table border="1">
		<th>available faculty:</th>
		<?php
		require_once "pdo.php";

		if(isset($_POST['availability']))
		{
			$tbl=$_POST['day'];
			$cmn=$_POST['when'];

			$stmt=$pdo->query("SELECT fname FROM $tbl where $cmn in ('available')");

			while( $row=$stmt->fetch(PDO::FETCH_ASSOC) )
			{
				echo"<tr><td>";
				echo ($row['fname']);
				echo ("</td></tr>\n");
			}
		}
			
		?>
	</table>

</center>
</body>
</html>
