<!--
 * Created by IntelliJ IDEA.
 * User: Yichen Zhu(yzhu421)
 * Date: 2017/4/1
 * Time: 23:39
 -->
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
// Find foodbank
$currentsession = $_SESSION['site_id'];
?>

<?php
$query = "SELECT * FROM `foodbank` WHERE Site_ID = $currentsession";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$foodbank = mysqli_fetch_assoc($result);

// Find foodpantry
$query = "SELECT * FROM `foodpantry` WHERE Site_ID = $currentsession";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$foodpantry = mysqli_fetch_assoc($result);

// Find shelter
$query = "SELECT * FROM `shelter` WHERE Site_ID = $currentsession";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$shelter = mysqli_fetch_assoc($result);

// Find soupkitchen
$query = "SELECT * FROM `soupkitchen` WHERE Site_ID = $currentsession";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$soupkitchen = mysqli_fetch_assoc($result);
?>

<?php
if (isset($_POST["addservice"])) {
    $servicetype = $_POST["servicetype"];
    $description = $_POST["description"];
    $hourofoperation = $_POST["hourofoperation"];
    $conditionforuse = $_POST["conditionforuse"];

    if ($servicetype == "foodbank")
        $query = "INSERT INTO foodbank (site_id , service_name)VALUES( $currentsession , '{$servicetype}')";
    else {
        $query = "INSERT INTO `$servicetype` (site_id , service_name, description, hours_of_operation, condition_for_use) VALUES ( $currentsession , '{$servicetype}', '{$description}','{$hourofoperation}', '{$conditionforuse}')";
    }
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
         redirect_to("siteservice.php");
    } else {
        // Failure
        die("Database query failed. " . mysqli_error($connection));
    }
    //redirect_to("addservice.php");
}
?>

<?php
if (isset($_POST["returnsiteservice"])) {
    redirect_to("siteservice.php");
}
?>


<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link href="style.css" rel="stylesheet" type="text/css">
<title>Add Service</title>
</head>
<div class="center">
<h1> Add Service </h1>
<p>
    <table>
        <form action="addservice.php" method="POST">
            <tr>
                <td><input type="submit" name="returnsiteservice" value="Go back to Site Service" /></td>
            </tr>
        </form>
    </table>
</p>

<div>
    <form action="addservice.php" method="post">
        <p>Service Type:
            <select name="servicetype">
                <?php
                if (!isset($foodbank)) {
                    ?>
                    <option value="foodbank">Food Bank</option>
                    <?php
                }
                ?>
                <?php
                if (!isset($foodpantry)) {
                ?>
                <option value="foodpantry">Food Pantry</option>
                    <?php
                }
                ?>
                <?php
                if (!isset($shelter)) {
                ?>
                <option value="shelter">Shelter</option>
                    <?php
                }
                ?>
                <?php
                if (!isset($soupkitchen)) {
                    ?>
                    <option value="soupkitchen">Soup Kitchen</option>
                    <?php
                }
                ?>
            </select>
        </p>
        <p>Description:
            <input type="text" name="description" value="" />
        </p>
        <p>Hour of Operation:
            <input type="text" name="hourofoperation" value="" />
        </p>
        <p>Condition for use:
            <input type="text" name="conditionforuse" value="" />
        </p>
        <input type="submit" name="addservice" value="Add Service" />
    </form>
</div>
</div>



<?php include("lib/footer.php"); ?>
