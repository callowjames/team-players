<?php
	//database information 
    $server = "localhost"; 
	$user = "root";
	$pass = "";
    $database = "jcallow3"; 
         
	//make the database connection 
	$mysqli = new mysqli($server, $user, $pass, $database);

	if ($mysqli->connect_error) 
		die("Connect Error " . $mysqli->connect_errno . ": " . $mysqli->connect_error);

//	echo "Connection successful";

?>