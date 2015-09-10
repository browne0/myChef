<?php 
	// State our connection to our database and start a session.
	require("common.php");

	// Use this in order to resubmit username value if user fails login
	$submitteduser = "";
	$error = "";

	if(!empty($_SESSION['user'])){
		header("Location: main");

	}

	// Check to see if a form was submitted;
	if(!empty($_POST))
	{
		if(empty($_POST['email']) || empty($_POST['pass']))
		{
			$error = "All fields are required.";
		}
		else
		{
			// Retrieve info from database
			$query = "SELECT id, fname, lname, password, salt, email FROM users WHERE email = :email";

			// Set param values
			$queryparams = array(
				':email' => $_POST['email']
				);

			try
			{
				// Execute query against database
				$stmt = $db -> prepare($query);
				$result = $stmt -> execute($queryparams);
			}

			// Catch error
			catch (PDOException $ex)
			{
				$error = "Oops! There was an error. Please try again.";
			}

			// Create variable to tell us whether user has logged in or not. Set to false in beginning, and switch it to true if correct credentials.
			$goodlogin = false;

			// Retrieve user data from database. If false, then username is not registered.
			$row = $stmt -> fetch();

			if($row)
			{
				// Using password submitted by user and salt stored in database, we check to see if passwords match
				$check_password = hash('sha256', $_POST['pass'] .$row['salt']);

				for($round = 0; $round < 65536; $round++)
				{
					$check_password = hash('sha256', $check_password . $row['salt']);
				}

				if($check_password == $row['password'])
				{
					// If true, then we change login variable to true.
					$goodlogin = true;
				}
			}

			// If user logged in successfully, then send them to private members-only page.
			if($goodlogin)
			{
				unset($row['salt']);
				unset($row['password']);
				$_SESSION['user'] = $row;
				header("Location: http://dev.beesdesign.net/mychef");
				die("Redirecting to: main.php");
			}
			else
			{
				$error = "Login failed. Please try again.";
				// Show them the email they entered.
				$submitteduser = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
			}
		}
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
		<nav class="navbar sticky" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo" href="http://dev.beesdesign.net/mychef"><p class="special">Westchester's</p> <p>myChef</p></a>
				</div>

				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a class="cl-effect" href="login">Login</a></li>
						<li><a class="cl-effect" href="register">Sign Up</a></li>
						<li><a class="cl-effect" href="#">Contact</a></li>
					</ul>
				</div> 
			</div>
		</nav>
	<div class="loginwrapper">

		<div class="loginbox">
			<div class="loginhead">
				<span class="logo"><em>Westchester's myChef</em></span>
			</div>
			<div class="loginform">
				<form method="post" action="login" novalidate>
					<div class="userinputs">
						<div class="inputwrap">
							<i class="fa fa-envelope-o"></i>
							<input type="email" placeholder="Email" name="email" value="<?php echo $submitteduser; ?>" required><br>
						</div>
						<div class="inputwrap">
							<i class="fa fa-key"></i>
							<input type="password" placeholder="Password" name="pass" required><br>
						</div>
					</div>
					<div id="formerror"><?php echo $error; ?></div>
					<div class="copyright">
						<small>&copy; Copyright 2015 <em>myChef</em>. All rights reserved.</small>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/jquery.backstretch.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/scripts.js"></script>

</body>
</html>