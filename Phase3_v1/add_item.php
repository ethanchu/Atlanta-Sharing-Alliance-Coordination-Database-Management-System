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
if (isset($_POST["add_item"])) {
    $Name = $_POST["Name"];
    $Unit = intval($_POST["Unit"]);
    $StorageType = $_POST["StorageType"];
    $ExpirationDate = $_POST["ExpirationDate"];
    $Category = $_POST["Category"];
    $SubCategory = $_POST["SubCategory"];
    $ServiceName = 'foodbank';
    $query = "INSERT INTO Item (`name`, unit, storage_type, expiration_date, category, sub_category, site_id, service_name) VALUES ('$Name', '$Unit', '$StorageType', '$ExpirationDate', '$Category', '$SubCategory', '$SiteID', '$ServiceName')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        echo 'Item added successfully!';
        redirect_to("add_item.php");
    } else {
        // Failure
        // die("Database query failed. " . mysqli_error($connection));
        echo 'Please fill in all the areas correctly';
    }
    //redirect_to("addservice.php");
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<title>Add Item</title>
</head>
<h4 style="text-align:center"> Add Item</h4>
<body>
<table>
    <form action="add_item.php" method="POST">
        <tr>
            <td><input type="submit" name="returnfoodbank" value="Go back to FoodBank Page" /></td>
        </tr>
    </form>
</table>

<div>
    <form action="add_item.php" method="POST">
        <p>Item Name:
            <input type="text" name="Name" value="" />
        </p>
        <p>Unit:
            <input type="number" name="Unit" value="" />
        </p>
        <p>Storage Type:
            <select name="StorageType">
                <option value="NULL"></option>
                <option value="drygood">drygood</option>
                <option value="refrigerated">refrigerated</option>
                <option value="frozen">frozen</option>
            </select>
        </p>
        <p>Expiration Date:
            <input type="date" name="ExpirationDate" value="" />
        </p>
        <p>Category:
            <select name="Category">
                <option value="food">Food</option>
                <option value="supplies">Supplies</option>
            </select>
        </p>
        <p>Sub-Category:
            <?php
                $cat = $_POST["Category"];
                /*
                if ($cat == 'Food') {
                    echo '<select name="SubCategory">
                            <option value="Vegetables">Vegetables</option>
                            <option value="nuts/grains/beans">nuts/grains/beans</option>
                            <option value="Meat/seafood">Meat/seafood</option>
                            <option value="Dairy/eggs">Dairy/eggs</option>
                            <option value="Sauce/Condiment/Seasoning">Sauce/Condiment/Seasoning</option>
                            <option value="Juice/Drink">Juice/Drink</option>
                          </select>';
                } else {
                    echo '<select name="SubCategory">
                            <option value="Personal hygiene">Personal hygiene</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Shelter">Shelter</option>
                            <option value="other">other</option>
                          </select>';
                }
                */
            echo '<select name="SubCategory">
                      <option value="vegetables">vegetables</option>
                      <option value="nuts/grains/beans">nuts/grains/beans</option>
                      <option value="meat/seafood">meat/seafood</option>
                      <option value="dairy/eggs">dairy/eggs</option>
                      <option value="sauce/condiments">sauce/condiment/seasoning</option>
                      <option value="juice/drink">juice/drink</option>
                      <option value="personal hygiene">personal hygiene</option>
                      <option value="clothing">clothing</option>
                      <option value="shelter">shelter</option>
                      <option value="other">other</option>
                 </select>';
            ?>
        </p>
        <input type="submit" name="add_item" value="Add Item" />
    </form>
</div>

<?php include("lib/footer.php"); ?>
