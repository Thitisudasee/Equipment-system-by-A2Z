<?php
	//for MySQLi OOP
	// $conn = new mysqli('localhost','i6133035_wp2','E.Pi4X94CF0KWQoF95S64','i6133035_wp2'); 
	$conn = new mysqli('10.199.66.227', '20S3_g4', 'l0RV9BNI', '20S3_g4');
	$conn->set_charset("utf8");

	if($conn->connect_error)
	{
	   die("Connection failed: " . $conn->connect_error);
	}
?>