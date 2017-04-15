<?php require_once("lib/db_connection.php"); ?>
<?php
$servicetype =  $_GET["servicetype"];
?>
<html> 
	<title>Search client</title>
	<link rel="stylesheet" type="text/css" href="site.css">
    <body>
  	Welcome to Atlanta Sharing Alliance Coordination System!
    <table>
    	<tr>
   	 		<td class="heading">name</td>
    		<td class="heading">ID</td>
    		<td class="heading"></td>
    	</tr>
    <?php	
		//get value passed from form in login.php file
		$name = $_POST['client_name'];
		

		//Query the database for user
		$sql="SELECT * FROM client where name LIKE '%$name%' ";//need to use single quote for variables
		$query= mysqli_query($connection,$sql);
		
		$count = mysqli_num_rows($query); 
		//no entry
    	if (empty(trim($name))) {
            $_SESSION['Error'] = "Please enter a name.";
            header("location: client.php?servicetype=$servicetype");
    	}
	    //no match
		if($count==0) {
			$_SESSION['Error'] = "SORRY... No matchehed client! Please register first.";
			header("location: client.php?servicetype=$servicetype");

		}
		//match more than 5
		if($count>5) {
			$_SESSION['Error'] = "Please enter a more unique search term";
			header("location: client.php?servicetype=$servicetype");

		}   
    	while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
    		$id = urlencode($row[0]);
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

