<?php



	// Execute common code we created to connect to database and start our session.

	require("common.php");
	$error = "";
	if(!empty($_POST))
	{
		if(
			empty($_POST['cusfirstname']) ||
			empty($_POST['cuslastname']) ||
			empty($_POST['cusemail']) ||
			empty($_POST['cuspass']) ||
			empty($_POST['cuszipcode']))
		{
			$error = "All fields are required.";
		}
		else 
		{
			// Set a query to see whether the email entered by user is already in use.
		
			$query = "SELECT 1 FROM `users` WHERE `email` = :email";



			// Define value for the :email token we just stated. (prevent sql injection)

			$query_params = array(':email' => $_POST['cusemail']);



			try

			{

				// Run query against database table

				$stmt = $db->prepare($query);

				$result = $stmt->execute($query_params);

			}

			catch(PDOException $ex)

			{

				// Query failed to run

				$error = "Oops! There was an error. Please try again.";

			}



			// Return array representing the seleted row from the 'results', or false if there are no rows.

			$row = $stmt->fetch();



			// If row returned, then username is in use

			if($row)

			{

				// Redirect them back to registration and say email is already in use.

				$error = "Oops, that email address already in use! Please try another one.";
			}


			else
			{
				// Use an Insert query to insert token values into database (prevent sql injection)

				$query = "INSERT INTO users(fname, lname, email, password, salt, zip) VALUES(:fname, :lname, :email, :password, :salt, :zip);";



				// Randomly generate salt to protect against brute force and/or rainbow table attacks.

				$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 



				// Hash the password with the salt so it can be stored securely in database.

				$password = hash('sha256', $_POST['cuspass'] . $salt);



				// Hash the hash value 65536 more times, so that an attacker must computer the hash 65537 times for each guess they make against the password.

				for($round = 0; $round < 65536; $round++)

				{

					$password = hash('sha256', $password . $salt);

				}



				// Prepare the rest of our tokens for insertion into SQL. (WE DON't STORE THE ORGINAL PASSWORD, ONLY THE HASHED VERSION OF IT)

				$query_params = array(

					':fname' => $_POST['cusfirstname'],

					':lname' => $_POST['cuslastname'],

					':email' => $_POST['cusemail'],

					':password' => $password,

					':salt' => $salt,

					':zip' => $_POST['cuszipcode']

					);



				try

				{

					// Execute query to create the user

					$stmt = $db->prepare($query);

					$result = $stmt->execute($query_params);

				}



				catch(PDOException $ex)

				{

					$error = "Oops! There was an error. Please try again.";

				}



				// Redirect to login page after user is created.

				header("Location: login");



				// Call die to prevent php script from executing and being sent to the user.

				die("Redirecting to login.php!");
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
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
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
	<div class="loginwrap">

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

		<div class="loginbox">
			<h1 class="text-center">Sign up with <em>myChef</em> to get started. </h1>
			<div class="col-sm-6 col-sm-offset-3 text-center optionwrap">
				<div class="col-sm-7">
					<p id="option1"><a onclick="showFormCustomer()">I'm a customer!</a></p>
				</div>
				<div class="col-sm-5">
					<p id="option2"><a onclick="showFormChef()">I'm a chef!</a></p>
				</div>
			</div>

			<div class="clearfix"></div>

			<div id="cusoption">
				<form action="register" method="post" class="cusform" name="cusform">
					<input type="text" name="cusfirstname" placeholder="First Name" class="nameinput" value="<?php echo htmlentities($_POST['cusfirstname']); ?>" required>
					<input type="text" name="cuslastname" placeholder="Last Name" class="nameinput" required value="<?php echo htmlentities($_POST['cuslastname']); ?>"><br>
					<input type="email" name="cusemail" placeholder="Email" class="emailinput" required value=""><br>
					<input type="password" pattern=".{0}|.{8,}" value="<?php echo htmlentities($_POST['cuspass']); ?>" name="cuspass" placeholder="Enter a password with at least 8 characters" class="emailinput" required><br>
					<input type="text" name="cuszipcode" placeholder="Zip Code" class="zipcodeinput" value="<?php echo htmlentities($_POST['cuszipcode']); ?>" required pattern="(\d{5}([\-]\d{4})?)">
					<input type="submit" value="Submit" class="submit">
				</form>
				
				<div id="formerror"><?php echo $error; ?></div>
			</div>
			<div id="chefoption">
				<div class="col-sm-6 col-sm-offset-3">
					<p class="ourchefs">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac turpis velit. </p>
					<div class="submitapp">
						<a href="#">
							<i class="fa fa-pencil-square-o"></i> Submit an application
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/validate.js"></script>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/jquery.backstretch.js"></script>
	<script src="assets/js/scripts.js"></script>
<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->
</body>
</html>