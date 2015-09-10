<?php 
	// Connect to database and start session
	require("common.php");

	// Check to see if user is logged in or not
	if(empty($_SESSION['user']))
	{
		// If incorrect then redirect them to login.
		header("Location: index");
		die("Redirecting to login.php");
	}

// EVERYTHING BELOW IS SECURED BY LOGIN SYSTEM
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>myChef | Home</title>
</head>
<body>
	<h1>Hello, 
		<?php 
			echo htmlentities($_SESSION['user']['fname'], ENT_QUOTES, 'UTF-8')." ";
			echo htmlentities($_SESSION['user']['lname'], ENT_QUOTES, 'UTF-8')
		?>!
</h1>
	<h2>Welcome to myChef.</h2>
	<a href="logout"><h3>Logout</h3></a>
</body>
</html>