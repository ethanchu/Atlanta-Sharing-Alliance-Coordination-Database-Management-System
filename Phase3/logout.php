<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>


<?php
	// v2: destroy session
	// assumes nothing else in session to keep
	$_SESSION = array();
 	if (isset($_COOKIE[session_name()])) {
   		setcookie(session_name(), '', time()-42000, '/');
 	}
 	session_destroy();
	redirect_to("home.php");
?>
