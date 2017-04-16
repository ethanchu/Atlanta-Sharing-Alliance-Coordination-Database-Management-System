<!--
 * Created by IntelliJ IDEA.
 * User: Yichen Zhu(yzhu421)
 * Date: 2017/4/1
 * Time: 23:39
 -->
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
if (isset($_POST["returnsiteservice"])) {
    redirect_to("siteservice.php");
}
?>

<?php
if (isset($_POST["addbunk"])) {
    redirect_to("addbunk.php");
}
?>

<?php
$currentsession = $_SESSION['site_id'];
// Update info for site service
if (isset($_POST["confirm"])) {
    $servicetype = $_POST["servicetype"];
    $description = $_POST["description"];
    $hoursofoperation = $_POST["hourofoperation"];
    $conditionforuse = $_POST["conditionforuse"];
    if ($servicetype == "soupkitchen"){
        $seatcapacity = $_POST["seatcapacity"];
        $seatavailable = $_POST["seatavailable"];
        $query = "UPDATE $servicetype SET description = '$description', hours_of_operation = '$hoursofoperation', condition_for_use = '$conditionforuse', seat_capacity = '$seatcapacity', seat_available = '$seatavailable'";
        $query .= " WHERE site_id = $currentsession AND service_name = '$servicetype'";

    }
    elseif ($servicetype == "shelter"){
        $familyroom_count = $_POST["familyroom_count"];
        $query = "UPDATE $servicetype SET description = '$description', hours_of_operation = '$hoursofoperation', condition_for_use = '$conditionforuse', familyroom_count = '$familyroom_count'";
        $query .= " WHERE site_id = $currentsession AND service_name = '$servicetype'";

    }
    else {
        $query = "UPDATE $servicetype SET description = '$description', hours_of_operation = '$hoursofoperation', condition_for_use = '$conditionforuse' WHERE site_id = $currentsession AND service_name = '$servicetype'";
    }
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        //redirect_to("editservice.php");
        redirect_to("editservice.php?servicetype=$servicetype");
    } else {
        // Failure
        die("Update Service failed." . mysqli_error($connection));
    }
    //redirect_to("addservice.php");
}
else {
    $servicetype = $_GET['servicetype'];
}
?>


<?php
// Retrive the previous info
$query = "SELECT * FROM `$servicetype` WHERE Site_ID = $currentsession";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$preinfo = mysqli_fetch_assoc($result);
?>



<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<title >Edit Service</title>
</head>

<div class="center">
<h4 style="text-align: center;"> Edit Service </h4>
<p>
<table>
    <form action="editservice.php" method="POST">
        <tr>
            <td><input type="submit" name="returnsiteservice" value="Go back to Site Service" /></td>
            <?php
            // Optional for Shelter
            if ($servicetype == "shelter") {
            ?>
                <td><input type="submit" name="addbunk" value="Add Bunk" /></td>
            <?php
            }
            ?>

        </tr>
    </form>
</table>
</p>

<div>
<table>
    <form action="editservice.php" method="POST">
        <tr>
        <td class="left">Service Type:</td>
        <td class="right"><input type="text" name="servicetype" style="width: 250px;" value="<?php echo $servicetype ?>" readonly="readonly"/></td>
        </tr>
         <tr>
        <td class="left">Description:</td>
        <td class="right"><input type="text" name="description" style="width: 250px;" value="<?php echo $preinfo['description'] ?>" /></td>
        </tr>
         <tr>
        <td class="left">Hour of Operation:</td>
        <td class="right"><input type="text" name="hourofoperation" style="width: 250px;" value="<?php echo $preinfo['hours_of_operation'] ?>" /></td>
        </tr>
         <tr>
        <td class="left">Condition for use:</td>
        <td class="right"><input type="text" name="conditionforuse" style="width: 250px;" value="<?php echo $preinfo['condition_for_use'] ?>" /></td>
        </tr>
        <?php
            // Optional for soupkitchen
            if ($servicetype == "soupkitchen") {
        ?>
             <tr>
		       <td colspan="2"><h4> Optional for Soup Kitchen </h4></td>
	         </tr>
             <tr>
        <td class="left">Seat Capacity:</td>
        <td class="right"><input type="text" name="seatcapacity" style="width: 250px;" value="<?php echo $preinfo['seat_capacity'] ?>" /></td>
        </tr>
        <tr>
        <td class="left">Seat Available:</td>
        <td class="right"><input type="text" name="seatavailable" style="width: 250px;" value="<?php echo $preinfo['seat_available'] ?>" /></td>
        </tr>
        <?php
        }
        ?>

        <?php
            // Optional for Shelter
            if ($servicetype == "shelter") {
        ?>
                
                <tr>
		       <td colspan="2"><h4> Optional for Shelter </h4></td>
	         </tr>
             <tr>
        <td class="left">Familyroom Count:</td>
        <td class="right"><input type="text" style="width: 250px;" name="familyroom_count" value="<?php echo $preinfo['familyroom_count'] ?>" /></td>
        </tr>

        <?php
        }
        ?>
           <tr>
		       <td colspan="2"><input type="submit" name="confirm" value="confirm" /></td>
	         </tr>
        
    </form>
   </table>
</div>


</div>


<?php include("lib/footer.php"); ?>
