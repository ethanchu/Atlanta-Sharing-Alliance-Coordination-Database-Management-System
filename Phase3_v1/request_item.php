/**
* Created by IntelliJ IDEA.
* User: mjnchen
* Date: 4/8/17
* Time: 12:42 AM
*/
// Need test
// How to deal with ItemID
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
// Find site_id of foodbank
$SiteID = $_SESSION['site_id'];
?>

// Need Yichen's editservice.php
<?php
if (isset($_POST["returneditservice"])) {
    redirect_to("editservice.php");
}
?>

<?php
// Retrive the previous info
$query = "SELECT count(*) FROM Item WHERE service_name=’FoodBank’ AND item_id=$ItemID AND site_id=$SiteID";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$NumProvide = mysqli_fetch_assoc($result);
?>

<?php
if (isset($_POST["request_item"])) {
    $NumRequest = $_POST["NumRequest"];
    $Status = 'pending';
    $query = "INSERT INTO Request ((user_ID, item_ID, site_id, num_request, num_provide, status) VALUES ($UserID, $ItemID, $SiteID, $NumRequest, $NumProvide, $Status))";
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        redirect_to("add_item.php");
    } else {
        // Failure
        die("Database update failed. " . mysqli_error($connection));
    }
    //redirect_to("addservice.php");
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>Add Item</title>
</head>

<h1> Add Item </h1>
<p>
<table>
    <form action="request_item.php" method="POST">
        <tr>
            <td><input type="submit" name="returneditservice" value="Go back to Service Page" /></td>
        </tr>
    </form>
</table>
</p>

<div>
    <form action="request_item.php" method="POST">
        <p>Number Request:
            <input type="text" name="NumRequest" value="" />
        </p>
        <input type="submit" name="request_item" value="Request Item" />
    </form>
</div>

<?php include("lib/footer.php"); ?>
