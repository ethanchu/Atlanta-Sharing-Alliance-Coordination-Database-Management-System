/**
* Created by IntelliJ IDEA.
* User: mjnchen
* Date: 4/8/17
* Time: 12:42 AM
*/
// Need further work
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
// Find site_id of foodbank
$SiteID = $_SESSION['site_id'];
$UserID = $_SESSION['user_id'];
?>

// Need Yichen's editservice.php
<?php
if (isset($_POST["returneditservice"])) {
    redirect_to("editservice.php?servicetype=foodbank");
}
?>

<?php
// Retrive the previous info
$query = "SELECT item_id FROM `Items` WHERE site_id = $SiteID and user_id = $UserID";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$ItemID = mysqli_fetch_assoc($result);
?>

<?php
if (isset($_POST["edit_item"])) {
    $Unit = $_POST["Unit"];
    $query = "UPDATE Item SET unit= $Unit WHERE item_id=$ItemID, site_id=$SiteID AND service='FoodBank'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        redirect_to("edit_item.php");
    } else {
        // Failure
        die("Database update failed. " . mysqli_error($connection));
    }
    //redirect_to("addservice.php");
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>Edit Item</title>
</head>

<h1> Edit Item </h1>
<p>
<table>
    <form action="edit_item.php" method="POST">
        <tr>
            <td><input type="submit" name="returneditservice" value="Go back to FoodBank Edit Page" /></td>
        </tr>
    </form>
</table>
</p>

<div>
    <form action="edit_item.php" method="POST">
        <p>Unit:
            <input type="text" name="Unit" value="" />
        </p>
        <input type="submit" name="edit_item" value="Add Bunk" />
    </form>
</div>

<?php include("lib/footer.php"); ?>
