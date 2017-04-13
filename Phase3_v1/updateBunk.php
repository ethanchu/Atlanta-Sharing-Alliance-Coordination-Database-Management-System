<?php require_once("lib/db_connection.php"); ?>
<?php
   if(isset($_POST['id'])) {
   	echo "updated {$_POST['id']}";
   	$query = "update Bunk set available_count = $_POST[available_count] where bunk_id = $_POST[id] "; 
     
   	$result = mysqli_query($connection, $query);
      
      header("location: BunkUser.php");
   } else {
   	echo "Not updated {$_POST['id']}";
   }
?>