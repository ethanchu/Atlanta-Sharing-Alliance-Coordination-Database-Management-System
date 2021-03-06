<!--
* Created by IntelliJ IDEA.
* User: mjnchen
* Date: 4/8/17
* Time: 12:42 AM
// Tested, seems to be OK
// How to deal with ItemID
-->
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>
<?php
$servicetype =  $_GET["servicetype"];
?>
<?php
// Find site_id of foodbank
$SiteID = $_SESSION['site_id'];
$UserID = $_SESSION['user_id'];
$ReqItemID = intval($_GET['reqitemid']);
$link = "request_item.php?reqitemid=".$ReqItemID;
// For testing
// $SiteID = 1; // Testing
// $UserID = 1; // Testing
?>

<?php
if (isset($_POST["returnsiteservice"])) {
    redirect_to("search_item.php?servicetype=$servicetype");
}
?>

<?php
if (isset($_POST['request_item'])) {
    $NumRequest = $_POST['NumRequest'];
    $query = "SELECT site_id FROM item WHERE item_id=$ReqItemID";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        // die("Query failed." . mysqli_error($connection));
        echo "Can not get site associated with user.";
    }
    if ($row = mysqli_fetch_array($result)) {
        $ReqItemSite = $row['site_id'];
    }
    if ($SiteID == $ReqItemSite) {
        // Cannot request item from the foodbank the user associated to
        echo "Item is in your foodbank. Should edit the item instead";
    } else {
        $query = "INSERT INTO request (user_id, item_id, num_request, num_provide, status) VALUES ($UserID, $ReqItemID, $NumRequest, 0, 'pending')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            // Success
            redirect_to("search_item.php?servicetype=$servicetype");
        } else {
            // Failure
            // die("Database query failed. " . mysqli_error($connection) . $ReqItemID);
            echo "Cannot update the database. Please check your inputs.";
        }
    }
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>Request Item</title>
<link rel="stylesheet" type="text/css" href="site.css">
</head>

<body>
<h4 style="text-align:center"> Requests item</h4>
<p>
<table>
    <form action="" method="POST">
        <tr>
            <td><input type="submit" name="returnsiteservice" value="Go back to Search Item" /></td>
        </tr>
    </form>
</table>
</p>

<div>
    <form action="" method="POST">
        <p>Number Request:
            <input type="number" name="NumRequest" value="" style="height: 30px"/>
        </p>
        <div style="text-align: center;"><input type="submit" name="request_item" value="Request Item" /></div>
    </form>
</div>

<?php include("lib/footer.php"); ?>
