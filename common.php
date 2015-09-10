<?php 

	// Setting variables for our PDO 

	$username = "beesdesi_admin";

	$password = "beesdesi";

	$host = "localhost";

	$dbname = "beesdesi_login";



	// Setting the following options array to the associated database connection code.

	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

	

	// Setting a try/catch block to connect to our MySQL database.



	try

	{

		// Open a connection to database using PDO library. 

		$db = new PDO("mysql:host={$host}; dbname={$dbname}; charset=utf8", $username, $password, $options);

	}



	catch(PDOException $ex)

	{

		// If error occurs, die and stop executing.

		die("Failed to connect to the database.");

	}



	// Throw an exception when it encouters an error. This should allow us to trap database errors.

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



	// Configure PDO to return database rows from database using an associative array.



	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);



	// Undo all magic quotes to prevent problems from ever occuring.



	if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())

	{

		function undo_magic_quotes_gpc(&$array)

		{

			foreach($array as &$value)

			{

				if(is_array($value))

				{

					undo_magic_quotes_gpc($value);

				}

				else

				{

					$value = stripslashes($value);

				}

			}

		}



		undo_magic_quotes_gpc($_POST);

		undo_magic_quotes_gpc($_GET);

		undo_magic_quotes_gpc($_COOKIE);

	}



	// Tell browser that content is using UTF-8, and should send content back using UTF-8.

	header('Content-Type: text/html; charset=utf-8');



	// Officially start session after connecting to database.

	session_start();
 