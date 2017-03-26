<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "Priyanka";
$database = "ASACS";

// Create connection
$con=mysql_connect($servername,$username,$password) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db($database,$con) or die("Failed to connect to MySQL: " . mysql_error());
?>
