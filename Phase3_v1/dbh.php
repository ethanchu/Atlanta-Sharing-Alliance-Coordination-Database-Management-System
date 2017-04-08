<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "team22_phase3";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>

