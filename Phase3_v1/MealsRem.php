<?php require_once("lib/db_connection.php"); ?>
<?php


$date = new DateTime ('now');
$datef = $date->format('Y-m-d H:i:s');

$query = "select sub_category,unit from (SELECT sub_category,sum(unit) as unit FROM Item WHERE  sub_category='Vegetables' and expiration_date >= '$datef' group by category,sub_category
UNION
SELECT sub_category,sum(unit) as unit FROM Item WHERE (sub_category='Meat/seafood' OR sub_category='Dairy/eggs') and expiration_date >= '$datef' group by category,sub_category
UNION
SELECT sub_category,sum(unit) as unit FROM Item WHERE sub_category='nut/grains/beans' and expiration_date >= '$datef' group by category,sub_category ) abc order by unit limit 1;";

$result = mysqli_query($connection, $query);
$unit = 0;
$sub_category = "";

if($row = mysqli_fetch_assoc($result))
{
	$unit= $row['unit'];
	$sub_category = $row['sub_category'];
	
}
?>
<html>
   
   <head>
      <title>Meals Remaining</title>
      <link rel="stylesheet" type="text/css" href="site.css">
   </head>
   
   <body>
      
    <form action ="Home.php" >
	<!-- For home page -->
	<button type="submit">HOME</button> 
	
   <br>
   <br>
   <br>
   <br>
   <div class="container">
   <!-- For Meals remaining -->
   <div>
    <label><b>Meals Remaining : </b></label>
    <input type="text" value="<?php echo $unit ?>" />
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- For donation type -->
  <div>
    <label><b>Donation Type Needed : </b></label>
     <input type="text" value=" <?php echo $sub_category ?>" /> 
  </div>
  </div>
	</form>  
</html>

<?php include("lib/footer.php"); ?>