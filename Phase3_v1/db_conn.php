<?php

if (!isset($_SESSION)) {
	session_start();
}

$servername = "127.0.0.1:3306";
$username = "root";
$password = "Priyanka";
$database = "cs6400_sp17_team022";

// Create connection
$con=mysql_connect($servername,$username,$password) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db($database,$con) or die("Failed to connect to MySQL: " . mysql_error());
?>
