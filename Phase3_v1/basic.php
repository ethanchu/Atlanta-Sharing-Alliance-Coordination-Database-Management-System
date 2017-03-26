<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
?>

<html lang="en">
	<head>
		<title>admin page</title>
	</head>
	<body>
		This is admin page for <?php echo htmlentities($_SESSION["username"]); ?>.
		
<?php include("./footer.php"); ?>
