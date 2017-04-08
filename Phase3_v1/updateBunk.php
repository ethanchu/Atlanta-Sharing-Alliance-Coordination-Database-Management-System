<?php
	include("db_conn.php");
   if(isset($_POST['id'])) {
   	echo "updated {$_POST['id']}";
   	$query = mysql_query("update Bunk set available_count = $_POST[available_count] where bunk_id = $_POST[id] ") or die(mysql_error()); 
      
      
      header("location: BunkUser.php");
   } else {
   	echo "Not updated {$_POST['id']}";
   }
?>