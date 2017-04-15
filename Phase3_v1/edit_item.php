
// Need further work
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
// Find site_id of foodbank
$SiteID = $_SESSION['site_id'];
// $SiteID = 1; // Assign SiteID for testing
?>

<?php
if (isset($_POST["returnfoodbank"])) {
    redirect_to("FBmainmenu.php");
}
?>

<?php
$ItemID = $_POST["itemid"];
$Unit = $_POST["Unit"];
if (isset($_POST['edit_item'])) {
    if ($Unit > 0) {
        $query = "UPDATE Item SET unit= $Unit WHERE item_id=$ItemID AND site_id=$SiteID AND service_name='foodbank'";
        $screenString = 'Update Item successfully!';
    } elseif ($Unit == 0) {
        $query = "DELETE FROM Item where item_id = $ItemID";
        $screenString = 'Delete Item successfully!';
    }
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        redirect_to("edit_item.php");
    } else {
        // Failure
        die("Database query failed. " . mysqli_error($connection));
    }
    echo $screenString;
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>Edit Item</title>
<link rel="stylesheet" type="text/css" href="site.css">
</head>

<h4 style="text-align: center; margin-top:50px;"> Edit Item </h4>
<p>
<table>
    <form action="edit_item.php" method="POST">
        <tr>
            <td><input type="submit" name="returnfoodbank" value="Go back to FoodBank Page" style="width:200px;"/></td>
        </tr>
    </form>
</table>
</p>

<div>
    <form action='edit_item.php' method="post">
        <?php
        // Get list of foodbanks
        $query = "SELECT item_id, `name` FROM `item` WHERE site_id = $SiteID";
        // Test if there was a query error
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Database query failed.");
        }
        if (mysqli_num_rows($result)) {
            $select = '<select name="itemid">';
            $select .= '<option disabled selected value> -- select an option -- </option>';
            while ($row = mysqli_fetch_array($result)) {
                $select .= '<option value="' . $row['item_id'] . '">' . $row['name'] . '</option>';
            }
            $select .= '</select>';
            echo $select;
        }
        ?>

        <p>Unit: <input type="number" name="Unit" value="" /></p>

        <div style="text-align: center;"> <input type="submit" name="edit_item"  value="Edit Item"></div>

    </form>
</div>

<?php include("lib/footer.php"); ?>
