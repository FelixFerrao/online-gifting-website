<?php
	$servername = "localhost";
	$database = "dbname"
	$username = "username";
	$password = "password";
	$port = "port-number"

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database, $port);

	// Check connection
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
	}
?>