<!--
 * Created by IntelliJ IDEA.
 * User: mjnchen
 * Date: 4/8/17
 * Time: 12:42 AM
 // Tested, Should be OK
 -->

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
        echo $screenString;
        redirect_to("edit_item.php");
    } else {
        // Failure
        // die("Database query failed. " . mysqli_error($connection));
        echo "Cannot update the database. Please check inputs.";
    }
    // echo $screenString;
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<title>Edit Item</title>
</head>
<h4 style="text-align:center"> Edit Item</h4>
<body>
<table>
    <form action="edit_item.php" method="POST">
        <tr>
            <td><input type="submit" name="returnfoodbank" style="width: 250px" value="Go back to FoodBank Page" /></td>
        </tr>
    </form>
</table>

<div>
<table>
    <form action='edit_item.php' method=post>
        <?php
        // Get list of foodbanks
        $query = "SELECT item_id, `name` FROM `item` WHERE site_id = $SiteID";
        // Test if there was a query error
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Database query failed.");
        }
        if (mysqli_num_rows($result)) {
            $select = '<tr><td></td><td class="right"><select name="itemid" style="height:30px;margin-bottom: 10px;">';
            $select .= '<option disabled selected value> -- select an option -- </option>';
            while ($row = mysqli_fetch_array($result)) {
                $select .= '<option value="' . $row['item_id'] . '">' . $row['name'] . '</option>';
            }
            $select .= '</select></td></tr>';
            echo $select;
        }
        ?>
        <tr>
        <td class="left">Unit:</td>
        <td class="right"><input type="number" name="Unit" value="" style="width: 250px;height: 30px;"  /></td>
        </tr>
        
         <tr>
		       <td colspan="2"><input type="submit" name="edit_item" ></td>
	         </tr>
             
       </table>
    </form>
</div>

<?php include("lib/footer.php"); ?>
