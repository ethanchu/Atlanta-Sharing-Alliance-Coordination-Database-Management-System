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
    if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        //redirect_to("editservice.php");
        redirect_to("editservice.php?servicetype=$servicetype");
    } else {
        // Failure
        die("Database update failed. " . mysqli_error($connection));
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
<link href="_css/styles.css" rel="stylesheet" type="text/css">
<title >Edit Service</title>
</head>

<div class="center">
<h1> Edit Service </h1>
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
    <form action="editservice.php" method="POST">
        <p>Service Type:
            <input type="text" name="servicetype" value="<?php echo $servicetype ?>" readonly="readonly"/>
        </p>
        <p>Description:
            <input type="text" name="description" value="<?php echo $preinfo['description'] ?>" />
        </p>
        <p>Hour of Operation:
            <input type="text" name="hourofoperation" value="<?php echo $preinfo['hours_of_operation'] ?>" />
        </p>
        <p>Condition for use:
            <input type="text" name="conditionforuse" value="<?php echo $preinfo['condition_for_use'] ?>" />
        </p>
        <?php
            // Optional for soupkitchen
            if ($servicetype == "soupkitchen") {
        ?>
             <h4> Optional for Soup Kitchen </h4>
                <p>
                 Seat Capacity:
                    <input type="text" name="seatcapacity" value="<?php echo $preinfo['seat_capacity'] ?>" />
                </p>
                <p>
                 Seat Available:
                 <input type="text" name="seatavailable" value="<?php echo $preinfo['seat_available'] ?>" />
                </p>

        <?php
        }
        ?>

        <?php
            // Optional for Shelter
            if ($servicetype == "shelter") {
        ?>
                <h4> Optional for Shelter: </h4>
                <p>
                     Familyroom Count:
                    <input type="text" name="familyroom_count" value="<?php echo $preinfo['familyroom_count'] ?>" />
                </p>

        <?php
        }
        ?>

        <input type="submit" name="confirm" value="confirm" />
    </form>
</div>


</div>


<?php include("lib/footer.php"); ?>
