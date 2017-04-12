<?php
include("db_conn.php");

$query = "select sub_category,unit from (SELECT sub_category,sum(unit) as unit FROM Item WHERE sub_category='Vegetables' group by category,sub_category
UNION
SELECT sub_category,sum(unit) as unit FROM Item WHERE sub_category='Meat/seafood' OR sub_category='Dairy/eggs' group by category,sub_category
UNION
SELECT sub_category,sum(unit) as unit FROM Item WHERE sub_category='nut/grains/beans' group by category,sub_category) abc order by unit limit 1;";

$result = mysqli_query($connection, $query);

if($row = mysqli_fetch_assoc($result))
	{
		$value1 = $row['unit'];
		$value2 = $row['sub_category'];
		
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
    <input type="text" value="<?php echo $value1?>" />
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- For donation type -->
  <div>
    <label><b>Donation Type Needed : </b></label>
     <input type="text" value=" <?php echo $value2?>" /> 
  </div>
  </div>
	</form>  
	
	

</html>