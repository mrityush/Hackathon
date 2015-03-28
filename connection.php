<?php
	global $con;
	$con=mysqli_connect("localhost","root","1mrityu1","Hackathon");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	};
?>