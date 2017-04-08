<?php
include ("db_conn.php");
if (isset ( $_SESSION ['username'] )) {
	$name = $_SESSION ['username'];
}
?>
<html>

<head>
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="site.css">
</head>

<body>
	<h1>Welcome <?php echo $name; ?> </h1>
	<a href="BunkUser.php">BunkUser</a>
</body>

</html>