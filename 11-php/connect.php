<?php 

	$dbname = 'b16';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbhost = 'localhost';


	$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$link) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}




?>