<?php 
	// Execute common code to connect to our database and start our session
	require("common.php");

	// Check to see if the user is logged in
	if(empty($_SESSION['user']))
	{
		// Redirect them if they are not logged in
		header("Location: login.php");

		// Execute die statement in order to prevent people from seeing your members-only content.
		die("Redirecting to login.php");
	}

 ?>

 <!DOCTYPE html>
<html>
<head>

	<title>Welcome to myChef</title>
	<!-- CSS Stylesheets -->

	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-social.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<!-- Fonts -->

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,700'>
	<link href='http://fonts.googleapis.com/css?family=Cabin:600' rel='stylesheet' type='text/css'>

	<!-- Favicon -->

	<link rel="shortcut icon" href="assets/ico/favicon.ico">
  	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  	<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
	<div id="main">
		<div class="container ">
			<nav class="navbar sticky">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand logo" href="http://dev.beesdesign.net/mychef/index.php"><p class="special">Westchester's</p> <p>myChef</p></a>
					</div>

					<ul class="nav navbar-nav navbar-right">
						<li>
							<div class="profpic">
								<img src="https://graph.facebook.com/<?php echo $_SESSION['FBID'];?>/picture">
							</div>
							<p> Hello, <?php echo $_SESSION['FULLNAME']; ?>! </p>
						</li>
						<li><a class="cl-effect" href="logout.php">Logout</a></li>
					</ul>
				</div>
			</nav>
		</div>

		<div class="container vcenter">
			<div class="setyourlocation">
				<p class="locationhead">
					1. Set your location <br>
					<span>Enter your zip code to find chefs near you.</span>
				</p>
			</div>
				<div class="locationcont">
					<form action="">
						<div class="inputmarker">
							<i class="fa fa-2x fa-map-marker"></i>
							<input type="text" class="enterzip" placeholder=" Enter ZIP Code">
						</div>
						<input type="submit" class="submitzip" value="Search">
					</form>
				</div>
		</div>
</body>
</html>