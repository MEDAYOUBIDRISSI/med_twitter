<?php
	$con=mysqli_connect("localhost","root","","twitter_med");
		if (!$con) {
			die("echec de conexion");
		}
		session_start();
		if (isset($_SESSION["email"])) 
		{
			SESSION_DESTROY();
			header("Location:login.php");
		}
		else
		{
			header("Location:login.php");
		}
?>