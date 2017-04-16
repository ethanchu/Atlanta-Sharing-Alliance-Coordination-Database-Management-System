<!--
 * Created by IntelliJ IDEA.
 * User: mjnchen
 * Date: 4/8/17
 * Time: 12:42 AM
// Tested, should be OK
// Updating database not work (fixed, need specific link in action part)
// Need also update inventory
// Parsing GET seems to work for now
// Edit outstanding requests (foodbank)
-->

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
    // Find units of items
    $query = "SELECT unit FROM item where item_id=$ReqItemID";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        // die("Query failed." . mysqli_error($connection));
        echo "Can not get available units of item.";
    }
    if ($row = mysqli_fetch_array($result)) {
        $unit = $row['unit'];
    }

    // Get number of request
    $query = "SELECT num_request FROM request where user_id=$ReqUserID AND item_id=$ReqItemID";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        // die("Query failed." . mysqli_error($connection));
        echo "Can not get number requested of the item.";
    }
    if ($row = mysqli_fetch_array($result)) {
        $num_request = $row['num_request'];
    }
    // Update request
    if ($_POST['Action'] == 'deny') {
        $query = "UPDATE request SET status='unable to fill' WHERE user_id=$ReqUserID AND item_id=$ReqItemID";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            // die("Query failed." . mysqli_error($connection));
            echo "Can not update request.";
        } else {
            redirect_to("view_report.php");
        }
    } elseif ($_POST['Action'] == 'accept') {
        if ($_POST['num_provide'] == "") {
            echo 'Please enter number to provide.';
            // redirect_to("edit_report.php");
        } else {
            $num_provide = $_POST['num_provide'];
            if ($num_provide > $unit || $num_provide > $num_request || $num_provide < 0) {
                echo 'Please enter a valid number';
                // redirect_to("edit_report.php");
            } elseif ($num_provide < $num_request) {
                $query1 = "UPDATE request SET num_provide=$num_provide, status='partially fulfilled' WHERE user_id=$ReqUserID AND item_id=$ReqItemID";
                $remain = $unit - $num_provide;
                $query2 = "UPDATE item SET unit=$remain WHERE item_id=$ReqItemID";

                $result1 = mysqli_query($connection, $query1);
                if (!$result1) {
                    // die("Query failed." . mysqli_error($connection));
                    echo "Can not update request.";
                }
                $result2 = mysqli_query($connection, $query2);
                if (!$result2) {
                    echo "Can not update inventory";
                } else {
                    redirect_to("view_report.php");
                }
            } else {
                // num_provde == num_request
                $query1 = "UPDATE request SET num_provide = $num_provide, status='in-full' WHERE user_id=$ReqUserID AND item_id=$ReqItemID";
                $remain = $unit - $num_provide;
                $query2 = "UPDATE item SET unit=$remain WHERE item_id=$ReqItemID";

                $result1 = mysqli_query($connection, $query1);
                if (!$result1) {
                    // die("Query failed." . mysqli_error($connection));
                    echo "Can not update request.";
                }
                $result2 = mysqli_query($connection, $query2);
                if (!$result2) {
                    echo "Can not update inventory";
                } else {
                    redirect_to("view_report.php");
                }
            }
        }
    }
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<title>Edit Outstanding Requests</title>
</head>
<h4 style="text-align:center"> Edit Outstanding Requests </h4>
<body>
<table>
    <form action="edit_report.php" method="POST">
        <tr>
            <td><input type="submit" name="returnviewreport" value="Go back to Outstanding Requests Page" /></td>
        </tr>
    </form>
</table>

<div>
    <form action=<?php echo $link; ?> method="POST">
        <p>Number Provide:
            <input type="number" name="num_provide" value =""/>
        </p>
        <p>Status:
            <select name="Action">
                <option value="accept">Accept</option>
                <option value="deny">Deny</option>
            </select>
        </p>
        <input type=submit name="edit_report">
    </form>

    <?php
    /*
    echo $ReqItemID;
    echo gettype($ReqItemID);
    echo $ReqUserID;
    echo gettype($ReqUserID);
    */
    // echo $num_provide;
    ?>
</div>

<?php include("lib/footer.php"); ?>
