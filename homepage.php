<?php
require_once "pdo.php";
if(isset($_POST['password']) )
{

	$sql = "SELECT username FROM fdetails
        WHERE  password = :pw and username= :us";

     $stmt=$pdo->prepare($sql);
     $stmt->execute(array(
     	':pw'=>$_POST['password'],
     	':us'=>$_POST['username']
     	));
     $row = $stmt->fetch(PDO::FETCH_ASSOC);

 	if ( $row === FALSE ) {
      	echo "<h1>Login incorrect.</h1>\n";
   	} else { 
      echo "<p>Login success.</p>\n";
  //    if(isset($_SESSION['username']))
   //   session_destroy();
      session_start();
      $_SESSION['username'] = $_POST['username'] ;
      header('Location:editavailability.php');
   	}
}
?>
<html>
	<head>
	</head>
	<body>
		<?php 
//		session_start();
//		$_SESSION['username']=$_POST['username'];
		?>
		<center>
		<a href="view.php">
			<h3>Click here to View faculty availability</h3>
		</a>
		<h3><p>Edit Faculty availability</p></h3>
		<form method="post" >
			<p>Faculty name:
				<input type="text" name="username">
			</p>
			
			<p>Password:
			<input type="password" name="password"></p>
			<p><input type="submit" value="Submit"/></p>
		</form>
		</center>

	</body>
</html>
