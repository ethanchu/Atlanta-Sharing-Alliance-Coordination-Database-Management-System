<?php
include ("db_conn.php");

$query_bunk = "SELECT Site.Name, CONCAT(Site.street_address,',', Site.city,',', Site.state,',', Site.zipcode) AS Address,Site.phone_number,
Shelter.hours_of_operation, Shelter.condition_for_use,Bunk.type, Bunk.available_count FROM(( Site INNER JOIN Bunk ON Site.site_id = Bunk.site_id)
INNER JOIN Shelter ON Site.site_id = Shelter.site_id) WHERE available_count>0;";

$result_bunk = mysqli_query($connection, $query_bunk);

$query_family = "SELECT Site.Name, CONCAT(Site.street_address,',', Site.city,',', Site.state,',', Site.zipcode) AS Address,Site.phone_number,
Bunk.type, Shelter.familyroom_count FROM(( Site INNER JOIN Bunk ON Site.site_id = Bunk.site_id)
INNER JOIN Shelter ON Site.site_id = Shelter.site_id) WHERE familyroom_count>0;";
$result_family = mysqli_query($connection, $query_family);

?>
<html>
<link rel="stylesheet" type="text/css" href="site.css">
<head>
<title>Bunk/Rooms Available</title>
</head>

<body>
	<!--  <h1>Welcome to bunk</h1> -->
      
    <?php
				if (isset ( $_SESSION ['username'] )) {
					echo "<a href=\"Welcome.php\">HOME</a>";
					
				} else {
					echo "<a href=\"Home.php\">HOME</a>";
				}
	?>

	<!-- Bunk table -->
	<h1 style="text-align: center;">Bunk</h1>
	<table border="1">
		<thead>
			<tr>
				<th>SiteName</th>
				<th>Address</th>
				<th>PhoneNumber</th>
				<th>HoursOfOperation</th>
				<th>Condition</th>
				<th>Type</th>
				<th>AvailableCount</th>
			</tr>
		</thead>
		<tbody>
        <?php
        while ( $row = mysqli_fetch_assoc ( $result_bunk) ) {
	     echo "<tr>
              <td>{$row['Name']}</td>
              <td>{$row['Address']}</td>
              <td>{$row['phone_number']}</td>
              <td>{$row['hours_of_operation']}</td>
              <td>{$row['condition_for_use']}</td>
              <td>{$row['type']}</td> 
 			  <td>{$row['available_count']}</td>
            </tr>\n";
								}
								?>
      </tbody>
	</table>


	<br>
	<br>
	<br>

	<!-- Family room table -->

	<h1 style="text-align: center;">Family Room</h1>
	<table border="1">
		<thead>
			<tr>
				<th>SiteName</th>
				<th>Address</th>
				<th>PhoneNumber</th>
				<th>Type</th>
				<th>FamilyRoomCount</th>
			</tr>
		</thead>
		<tbody>
        <?php
        while ( $row = mysqli_fetch_assoc ( $result_family) ) {
	   echo "<tr>
              <td>{$row['Name']}</td>
              <td>{$row['Address']}</td>
              <td>{$row['phone_number']}</td>
              <td>{$row['type']}</td> 
 			  <td>{$row['familyroom_count']}</td>
            </tr>\n";
								}
								?>
      </tbody>
	</table>
</body>

</html>
