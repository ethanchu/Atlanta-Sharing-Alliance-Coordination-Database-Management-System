<?php require_once("lib/db_connection.php"); ?>
<?php
$servicetype =  $_GET["servicetype"];
?>
<html> 
	<title>Search client</title>
	<link rel="stylesheet" type="text/css" href="site.css">
    <body>
  	Welcome to Atlanta Sharing Alliance Coordination System!
    <table border="1" style="margin-top: 50px;margin-bottom: 20px;">
    	
    	<tr>
   	 		<td class="heading" style="width: 200px;">name</td>
    		<td class="heading" style="width: 68px;">ID</td>
    		<td class="heading" style="width: 68px;"></td>
    	</tr>
    <?php	
		//get value passed from form in login.php file
		
		$id= $_POST['client_cardID'];

		//Query the database for user
		$sql="SELECT * FROM client where description LIKE '%{$id}%'";//need to use single quote for variables
		$query= mysqli_query($connection,$sql);
		
		$count = mysqli_num_rows($query); 
		//no entry
    	if (empty(trim($id))) {
            $_SESSION['Error'] = "Please enter an ID.";
            header("location: client.php");	
    	}
	    //no match
		if($count==0) {
			$_SESSION['Error'] = "SORRY... No matchehed client! Please register first.";
			header("location: client.php");

		}
		//match more than 5
		if($count>5) {
			$_SESSION['Error'] = "Please enter a more unique search term";
			header("location: client.php");	

		}
    	while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
        	print "<tr>";
			print "<td>" . $row[3] . "</td>";
			print "<td>" . $row[4] . "</td>";
			print '<td><a href="client_report.php?servicetype='.urlencode($servicetype).'&selectID=' . urlencode($row[0]) . '">select</a></td>';
			print "</tr>";	
   		}
    ?>
    </table>
		<div style="text-align: center;"> <a href="client.php?servicetype=<?php echo $servicetype?>">Go back to Client</a></div>

    <?php include("lib/footer.php"); ?>

