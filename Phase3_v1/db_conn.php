<?php
if (!isset($_SESSION)) {
    session_start();
}
define("DB_SERVER", "127.0.0.1");
define('DB_PORT', "3306");
define('DB_USER', "root");
define('DB_PASS', "Priyanka");
define('DB_SCHEMA', "cs6400_sp17_team022");
// 1. Create a database connection
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_SCHEMA, DB_PORT);
// Test if connection succeeded
if(mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}
?>