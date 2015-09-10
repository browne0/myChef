<?php 
	// Connect to database and start session
	require("common.php");

	// Remove user's data from session
	unset($_SESSION['user']);

	// Redirect them to login page
	header("Location: http://dev.beesdesign.net/mychef");
	die("Redirecting to login.php");
 ?>