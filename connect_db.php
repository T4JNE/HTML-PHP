<?php
	$host = "localhost";
	$db = "fuszki_db";
	$login = "root";
	$pass = "";

	$conn = new mysqli($host,$login,$pass,$db);

	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
?>
