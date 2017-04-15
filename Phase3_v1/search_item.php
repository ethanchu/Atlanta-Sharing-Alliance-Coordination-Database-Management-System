<!--
* Created by IntelliJ IDEA.
* User: mjnchen
* Date: 4/8/17
* Time: 12:42 AM
// Tested, should be OK
// Request item part not done
-->

<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
$SiteID = $_SESSION['site_id'];
$UserID = $_SESSION['user_id'];
// $SiteID = 1; // Testing
// $UserID = 1; // Testing
?>

<?php
if (isset($_POST["returnmainmenu"])) {
    redirect_to("siteservice.php"); // Temp direct to Main menu
}
?>

<?php
if (!isset($_POST['foodbank'])) {
    // From all food banks
    if (!isset($_POST['searchStr'])) {
        $query = "SELECT item_id, `name`, unit, storage_type, expiration_date, category, sub_category FROM Item WHERE service_name='foodbank'";
    } else {
        $match = $_POST['searchStr'];
        $query = "SELECT item_id, `name`, unit, storage_type, expiration_date, category, sub_category FROM Item WHERE service_name='foodbank' AND (expiration_date LIKE '%{$match}%' OR storage_type LIKE '%{$match}%' OR category LIKE '%{$match}%' OR sub_category LIKE '%{$match}%' OR name LIKE '%{$match}%')";
    }
} else {
    $site = $_POST['foodbank'];
    if (!isset($_POST['searchStr'])) {
        $query = "SELECT item_id, `name`, unit, storage_type, expiration_date, category, sub_category FROM Item WHERE service_name='foodbank' AND site_id=$site";
    } else {
        $match = $_POST['searchStr'];
        $query = "SELECT item_id, `name`, unit, storage_type, expiration_date, category, sub_category FROM Item WHERE service_name='foodbank' AND site_id=$site AND (expiration_date LIKE '%{$match}%' OR storage_type LIKE '%{$match}%' OR category LIKE '%{$match}%' OR sub_category LIKE '%{$match}%' OR name LIKE '%{$match}%')";
    }
}
// Test if there was a query error
$searchResult = mysqli_query($connection, $query);
if (!$searchResult) {
    die("Items select failed.".mysqli_error($connection));
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link href="_css/styles.css" rel="stylesheet" type="text/css">
<title>Search Items</title>
</head>
<body>
<div>
    <h1> Search Items </h1>
    <table>
        <form action="search_item.php" method="POST">
            <tr>
                <td><input type="submit" name="returnmainmenu" value="Go back to Main Menu" /></td>
            </tr>
        </form>
    </table>

    <form action='search_item.php' method=post>
        <?php
        // Get list of foodbanks
        $query = "SELECT b.site_id as id, b.name as name FROM `foodbank` a JOIN `site` b on a.site_id = b.site_id";
        // Test if there was a query error
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Database query failed.");
        }
        if (mysqli_num_rows($result)) {
            $select = '<select name="foodbank">';
            $select .= '<option disabled selected value> -- select an option -- </option>';
            while ($row = mysqli_fetch_array($result)) {
                $select .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
            $select .= '</select>';
            echo $select;
        }
        ?>
        Search: <input type="text" name="searchStr" value=""/>
        <input type=submit>

    </form>

    <?php
        // Print the column names as the headers of a table
        echo '<table cellpadding="0"> <tr>';
        for($i = 0; $i < mysqli_num_fields($searchResult); $i++) {
            $field_info = mysqli_fetch_field($searchResult);
            if ($i > 0) {
                echo "<th>{$field_info->name}</th>";
            }
        }

        // Print the data
        while($row = mysqli_fetch_array($searchResult)) {
            echo "<tr>";
            /*
            foreach($row as $_column) {
                echo "<td>{$_column}</td>";
            }
            */
            // echo "<td>{$row['item_id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['unit']}</td>";
            echo "<td>{$row['storage_type']}</td>";
            echo "<td>{$row['expiration_date']}</td>";
            echo "<td>{$row['category']}</td>";
            echo "<td>{$row['sub_category']}</td>";
            $reqitemid = $row['item_id'];
            $link = "request_item.php?reqitemid=".$reqitemid;

            echo '<td><a href='.$link.'>Request Item</a></td>';
            echo "</tr>";
        }

        echo "</table>";
    ?>

</div>

<?php include("lib/footer.php"); ?>
