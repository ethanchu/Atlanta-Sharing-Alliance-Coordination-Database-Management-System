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
$ReqUserID = intval($_GET['requserid']);
$ReqItemID = intval($_GET['reqitemid']);
$link = "edit_report.php?requserid=".$ReqUserID."&reqitemid=".$ReqItemID;
// $SiteID = 1; // Assign SiteID for testing
?>

<?php
if (isset($_POST["returnviewreport"])) {
    redirect_to("view_report.php");
}
?>

<?php
if (isset($_POST["edit_report"])) {
    $NumProvide = $_POST['num_provide'];
    $Status = $_POST['status'];
    // Why database is not updated
    $query = "UPDATE request SET num_provide=$NumProvide, status='$Status' WHERE user_id=$ReqUserID AND item_id=$ReqItemID";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query failed. " . mysqli_error($connection));
    }

    // Update inventory
    // Find units of items
    $query = "SELECT unit FROM item where item_id=$ReqItemID";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed." . mysqli_error($connection));
    }
    if ($row = mysqli_fetch_array($result)) {
        $unit = $row['unit'];
    }
    if ($Status == 'closed') {
        if ($NumProvide > $unit) {
            $query = "UPDATE item SET unit=0 WHERE item_id=$ReqItemID";
        } else {
            $remain = $unit - $NumProvide;
            $query = "UPDATE item SET unit=$remain WHERE item_id=$ReqItemID";
        }
        $result = mysqli_query($connection, $query);
        if ($result) {
            // Success
            redirect_to("view_report.php");
        } else {
            // Failure
            die("Database query failed. " . mysqli_error($connection));
        }
    } else {
        redirect_to("view_report.php");
    }
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>Edit Outstanding Requests</title>
<link rel="stylesheet" type="text/css" href="site.css">
</head>

<h4 style="text-align:center; margin-top:20px;"> Edit Outstanding Request </h4>
<p>
<table>
    <form action="edit_report.php" method="POST">
        <tr>
            <td><input type="submit" name="returnviewreport" value="Go back to Outstanding Requests Page" style="width:250px;" /></td>
        </tr>
    </form>
</table>
</p>

<div>
    <form action="edit_report.php" method="POST">
        <p>Number Provided:
            <input style="margin-left:10px;" type="text" name="num_provide" value="" />
        </p>
        <p>Status:

            <select name="status" style="margin-left:80px;">
                <option value="closed">Closed</option>
                <option value="pending">Pending</option>
            </select>
        </p>
        </p>
       <div style="text-align:center;"> <input type="submit" name="edit_report" value="Edit Report" /></div>
    </form>
</div>

<?php include("lib/footer.php"); ?>
