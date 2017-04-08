/**
 * Created by IntelliJ IDEA.
 * User: mjnchen
 * Date: 4/8/17
 * Time: 12:42 AM
 */
// Should be OK
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
    $Name = $_POST["Name"];
    $Unit = $_POST["Unit"];
    $StorageType = $_POST["StorageType"];
    $ExpirationDate = $_POST["ExpirationDate"];
    $Category = $_POST["Category"];
    $SubCategory = $_POST["SubCategory"];
    $query = "INSERT INTO Item ((name, unit, storage_type, expiration_date, category, sub_category, site_id, service) VALUES ($Name, $Unit, $StorageType, $ExpirationDate, $Category, $SubCategory, $SiteID, ‘FoodBank’))";
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        redirect_to("add_item.php");
    } else {
        // Failure
        die("Database query failed. " . mysqli_error($connection));
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
    <form action="add_item.php" method="POST">
        <tr>
            <td><input type="submit" name="returneditservice" value="Go back to FoodBank Edit Page" /></td>
        </tr>
    </form>
</table>
</p>

<div>
    <form action="add_item.php" method="POST">
        <p>Item Name:
            <input type="text" name="Name" value="" />
        </p>
        <p>Unit:
            <input type="text" name="Unit" value="" />
        </p>
        <p>Storage Type:
            <input type="text" name="StorageType" value="" />
        </p>
        <p>Expiration Date:
            <input type="text" name="ExpirationDate" value="" />
        </p>
        <p>Category:
            <input type="text" name="Category" value="" />
        </p>
        <p>Sub-Category:
            <input type="text" name="SubCategory" value="" />
        </p>
        <input type="submit" name="add_item" value="Add Bunk" />
    </form>
</div>

<?php include("lib/footer.php"); ?>
