<?php require_once("lib/db_connection.php"); ?>
<html>
<head> <title>Atlanta Sharing Alliance Coordination System</title></head>
<body>
	Welcome to Atlanta Sharing Alliance Coordination System!

<form action ="Login.php" method = "post">
		<input type="submit" value = "Log In">
</form>

<form action ="BunkGuest.php" method = "post">
		<input type="submit" value = "View Bunks/Rooms">
</form>

<form action ="MealsRem.php" method = "post">
		<input type="submit" value = "View Meals Remaining">
</form>


</body>
</html>