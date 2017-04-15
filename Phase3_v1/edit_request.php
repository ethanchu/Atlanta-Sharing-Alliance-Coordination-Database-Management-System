/**
* Created by IntelliJ IDEA.
* User: mjnchen
* Date: 4/8/17
* Time: 12:42 AM
*/
// May not be needed?
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
$SiteID = $_SESSION['site_id'];
$ReqUserID = intval($_GET['requserid']);
$ReqItemID = intval($_GET['reqitemid']);
$link = "edit_request.php?requserid=".$ReqUserID."&reqitemid=".$ReqItemID;
// $SiteID = 1; // Assign SiteID for testing
?>

<?php
if (isset($_POST["returnviewrequest"])) {
    redirect_to("view_request.php");
}
?>

<?php
if (isset($_POST['cancel_request'])) {
    $choice = $_POST['choice'];
    if ($choice == 'yes') {
        $query = "DELETE FROM request WHERE user_id=$ReqUserID and item_id=$ReqItemID";
        $result = mysqli_query($connection, $query);
        if ($result) {
            // Success
            redirect_to("view_request.php");
        } else {
            // Failure
            die("Database query failed. " . mysqli_error($connection));
        }
    } else {
        redirect_to("view_request.php");
    }
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>Cancel Request</title>
<link rel="stylesheet" type="text/css" href="site.css">
</head>

<h4 style="text-align: center"> Cancel Request </h4>
<p>
<table>
    <form action="cancel_request.php" method="POST">
        <tr>
            <td><input type="submit" name="returnviewrequest" value="Go back to View Requests Page" style="width:200px;"/></td>
        </tr>
    </form>
</table>
</p>

<div>
    <form action=<?php echo $link; ?>  method="POST">
        <p>Cancel?
            <select name="choice" style="margin-left:30px;">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </p>
       <div style="text-align: center"> <input type="submit" name="cancel_request" value="Confirm" /></div>
    </form>
</div>

<?php include("lib/footer.php"); ?>
