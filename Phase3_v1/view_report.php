/**
 * Created by IntelliJ IDEA.
 * User: mjnchen
 * Date: 4/8/17
 * Time: 12:42 AM
 */
// Needs test
// View outstanding requests
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
if (!isset($_POST['sort_col'])) {
    $query = "SELECT user_id, i.item_id, `name`, num_request, num_provide, unit, storage_type, category, sub_category, status FROM item AS i join request AS r on i.item_id=r.item_id where i.site_id = $SiteID";
} else {
    $SortCol = $_POST['sort_col'];
    $query = "SELECT user_id, i.item_id, `name`, num_request, num_provide, unit, storage_type, category, sub_category, status FROM item AS i join request AS r on i.item_id=r.item_id where i.site_id = $SiteID order by `$SortCol`";
}
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("View outstanding requests failed.".mysqli_error($connection));
}
?>

<?php
    // Find items with inventory shortfall
    $query = "SELECT item_id FROM (SELECT item_id, unit, sum(num_request) AS total_request FROM (SELECT i.item_id, `name`, num_request, unit FROM item AS i join request AS r on i.item_id=r.item_id where i.site_id = $SiteID) a GROUP BY item_id, unit) b WHERE total_request > unit";
    $shortfall = mysqli_query($connection, $query);
    $numOfRows = mysqli_num_rows($shortfall);

    for ($i = 0; $i < $numOfRows; $i++) {
        $row = mysqli_fetch_array($shortfall);
        $result_array[$i] = $row['item_id'];
    }
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>View Outstanding Requests</title>
<link rel="stylesheet" type="text/css" href="site.css">
</head>

<h4 style="text-align:center" > View Outstanding Requests </h4>
<p>
<table>
    <form action="view_report.php" method="POST">
        <tr>
            <td><input type="submit" name="returnfoodbank" value="Go back to FoodBank Page" style="width:250px"/></td>
        </tr>
    </form>
</table>
</p>


<div>
    <form action="view_report.php" method="POST">
        <p>Sort by:
            <select name="sort_col">
                <option disabled selected value> -- select an option -- </option>
                <option value="storage_type">Storage Type</option>
                <option value="category">Category</option>
                <option value="sub_category">Sub-Category</option>
                <option value="num_request">Number Requested</option>
            </select>
            <input type=submit>
        </p>
    </form>

    <?php
    // Print the column names as the headers of a table
    echo '<table cellpadding="0"> <tr>';
    for($i = 0; $i < mysqli_num_fields($result); $i++) {
        $field_info = mysqli_fetch_field($result);
        if ($i > 1) {
            echo "<th>{$field_info->name}</th>";
        }
    }

    // Print the data
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        /*
        foreach($row as $_column) {
            echo "<td>{$_column}</td>";
        }
        */
        // echo "<td>{$row['user_id']}</td>";
        // echo "<td>{$row['item_id']}</td>";
        echo "<td>{$row['name']}</td>";
        if ($numOfRows > 0 && in_array($row['item_id'], $result_array)) {
            echo "<td bgcolor='red'>{$row['num_request']}</td>";
        } else {
            echo "<td>{$row['num_request']}</td>";
        }
        echo "<td>{$row['num_provide']}</td>";
        echo "<td>{$row['unit']}</td>";
        echo "<td>{$row['storage_type']}</td>";
        echo "<td>{$row['category']}</td>";
        echo "<td>{$row['sub_category']}</td>";
        echo "<td>{$row['status']}</td>";
        $requserid = $row['user_id'];
        $reqitemid = $row['item_id'];
        $link = "edit_report.php?requserid=".$requserid."&reqitemid=".$reqitemid;
        // echo '<td><a href="edit_report.php">Edit</a></td>';
        echo '<td><a href='.$link.'>Edit</a></td>';
        echo "</tr>";
    }

    echo "</table>";
    ?>

</div>

<?php include("lib/footer.php"); ?>
