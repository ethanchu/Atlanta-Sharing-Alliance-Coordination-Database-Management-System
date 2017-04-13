<?php require_once("lib/db_connection.php"); ?>

<!DOCTYPE html>
<html>
<head> 
	<title>Client Page</title>
	<link rel="stylesheet" type="text/css" href="style.css"
</head>
<body>
	Welcome to Atlanta Sharing Alliance Coordination System!


	<div id="frm">
		<a href="siteservice.php">Home</a>	
		<form action ="searchname.php" method = "POST">
			<p>
				<label>Client Name</label>
				<input type="text" id = "client" name = "client_name" />
			</p>
			<p>	
				<input type="submit" id = "submit" value = "Search Name" />
			</p>
		</form>	
		<form action ="searchid.php" method = "POST">		
			<p>
				<label>Client ID</label>
				<input type="text" id = "cardID" name = "client_cardID" />
			</p>	
			<p>
				<input type="submit" id = "submit" value = "Search ID" />
			</p>					
		</form>
		
		<form action ="registerclient.php" method = "POST">
			<p>
				<input type="submit" id = "submit" value = "Register Client" />
			</p>	

		</form>

			<?php if( isset($_SESSION['Error']) ){
	
        echo $_SESSION['Error'];

        unset($_SESSION['Error']);
	}?>

	</div>


<?php include("lib/footer.php"); ?>