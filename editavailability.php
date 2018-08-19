<?php
  require_once "pdo.php";
  session_start();
  if(!isset($_SESSION['username']))
  {
   		header('location:homepage.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><center>
	<br>
	<center>
	<a href="homepage.php">go back</a>
		

	<form method="post"  >
		<h3>
		Select day and time for which you want to update faculty availability
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

    	<h5>Changed to</h5>
    	<input type="text" name="changedto: ">
    	<br>
    	<br>
    	<input type="submit" name="editavailability" value="Submit"/>


    	<br>
    </form>
    <br>
    </center>

<?php

   if(isset($_POST['editavailability']))
{
	$tbl=$_POST['day'];
	$cmn=$_POST['when'];
	$changedto = $_POST['changedto'];
	$usn=$_SESSION['username'];
	
    
	$sql="UPDATE $tbl SET $cmn=?  WHERE fname=?";

	$stmt = $pdo->prepare($sql);

	$stmt->execute([$changedto,$usn]);

	session_destroy();
}

?>

    	<br>
    	<table border="1">
		<th>faculty name</th>
		<th>9.00-10.00</th>
		<th>10.00-11.00</th>
		<th>11.15-12.15</th>
		<th>12.15-13.15</th>
		<th>13.45-14.45</th>
		<th>14.45-15.45</th>
		<th>15.45-16.45</th>
		<?php

	//		$tbl=$_POST['day'];
		//	$cmn=$_POST['when'];
			$stmt=$pdo->query("SELECT * FROM mon");

			while( $row=$stmt->fetch(PDO::FETCH_ASSOC) )
			{
				echo"<tr><td>";
				echo ($row['fname']);
				echo "</td>";

				echo"<td>";
				echo ($row['p9to10']);
				echo "</td>";

				echo"<td>";
				echo ($row['p10to11']);
				echo "</td>";

				echo"<td>";
				echo ($row['p1115to1215']);
				echo "</td>";

				echo"<td>";
				echo ($row['p1215to1315']);
				echo "</td>";

				echo"<td>";
				echo ($row['p1345to1445']);
				echo "</td>";

				echo"<td>";
				echo ($row['p1445to1545']);
				echo "</td>";

				echo"<td>";
				echo ($row['p1545to1645']);
				echo "</td>";

				echo ("</tr>\n");
			}
		
			
		?>
	    </table>

</center>
</body>
</html>
