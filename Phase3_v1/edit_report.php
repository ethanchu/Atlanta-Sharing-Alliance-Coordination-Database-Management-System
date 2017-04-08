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
    redirect_to("editservice.php?servicetype=foodbank");
}
?>

<?php
if (isset($_POST["add_item"])) {
    $NumProvide = $_POST["NumProvide"];
    $Status = $_POST["Status"];
    $ItemID = $_POST["ItemID"];
    $query = "UPDATE Request SET num_provide = $NumProvide, status='$Status' WHERE user_id = $UserID AND item_id=$ItemID AND site_id=$SiteID";
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        redirect_to("edit_report.php");
    } else {
        // Failure
        die("Database update failed. " . mysqli_error($connection));
    }
    //redirect_to("addservice.php");
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>Edit Outstanding Requests</title>
</head>

<h1> Edit Outstanding Request </h1>
<p>
<table>
    <form action="edit_report.php" method="POST">
        <tr>
            <td><input type="submit" name="returneditservice" value="Go back to FoodBank Edit Page" /></td>
        </tr>
    </form>
</table>
</p>

<div>
    <form action="edit_report.php" method="POST">
        <p>Number Provided:
            <input type="text" name="NumProvide" value="" />
        </p>
        <p>Status:
            <input type="text" name="Status" value="" />
        </p>
        </p>
        <input type="submit" name="edit_report" value="Edit request" />
    </form>
</div>

<?php include("lib/footer.php"); ?>
