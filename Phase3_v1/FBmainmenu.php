<?php require_once("lib/db_connection.php"); ?>

<html>

<head>

<title>Foodbank Main Menu </title>
<link rel="stylesheet" type="text/css" href="site.css">
</head>


<body>

<a href="siteservice.php"><button type="submit">Go Back to Site Service</button></a>
<!--<h1>Back To Home </h1> -->
<br>
<br>
<br>

<!-- For Add item page -->
<div class="container">
<a href="add_item.php"><button type="submit">Add Items</button></a>
</div>


<!-- For edit item page -->
<div class="container">
<a href="edit_item.php"><button type="submit">Edit Items</button></a>
</div>


<!-- For Request Status Report page -->
<div class="container">
<a href="view_request.php"><button type="submit">Request Status Report</button></a>
</div>



<?php include("lib/footer.php"); ?>