<?php
include("BunkGuest.php");
if (isset ( $_SESSION ['user_id'] )) {
	$query_bunk = "Select Bunk.bunk_id, Bunk.type, Bunk.count, Bunk.available_count FROM(( Site INNER JOIN Bunk ON Site.site_id = Bunk.site_id)
	INNER JOIN Shelter ON Site.site_id = Shelter.site_id INNER JOIN User ON Site.site_id = User.site_id) WHERE available_count>0 and User.user_id=$_SESSION[user_id]";
	
	$result = mysqli_query($connection, $query_bunk);
}
?>

<html>
   <head>
      <title>BunkUser</title>
      <link rel="stylesheet" type="text/css" href="site.css">
   </head>
   <body>
   
   <table border="1" style="margin-top:50;">
   <thead>
   <tr>
   <td>Type</td>
   <td>Count</td>
   <td>Available Count</td>
   <td>Action</td>
   </tr>
   </thead>
   <tbody>
   <?php
   while ( $row = mysqli_fetch_assoc ( $result) ) {
									echo "<form action=\"updateBunk.php\" method=\"post\"><tr>
              <td>{$row['type']}</td>
              <td>{$row['count']}</td>
              <td><input style=\"width:70px;\" name=\"available_count\" type=\"text\" value=\"{$row['available_count']}\" /></td>
              <td style=\"width: 100px;\"><input name=\"id\" type=\"hidden\" value=\"{$row['bunk_id']}\" /><button style=\"width:80%\" type=\"submit\">Update</button></td>
              
            </tr></form>\n";
								}
								?>
   </tbody>
   </table>
   </body>
</html>