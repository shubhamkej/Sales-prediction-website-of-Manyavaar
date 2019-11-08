<?php
session_start();
?>


<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<script src="jquery-3.3.1.min.js"></script>
 	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

</head>

<body style ="background: url('img/bg2.jpg');background-size:cover;">
	<h1 style="color:white;">THANKYOU</h1><br><br>
	<?php

	echo "Username is " . $_SESSION["user"] . ".<br>";
	//echo "Password is " . $_SESSION["pwd"] . ".";
	session_destroy();
	
	?>
			<div>
			<a href="login.php">Login</a> 
			</div>
</body>