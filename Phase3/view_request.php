<!--
 * Created by IntelliJ IDEA.
 * User: mjnchen
 * Date: 4/8/17
 * Time: 12:42 AM
// Tested, should be OK
// Haven't tested return to site service page
// View requests (site service)
-->

<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>
<?php
$servicetype =  $_GET["servicetype"];
?>

<?php
// Find site_id of foodbank
$UserID = intval($_SESSION['user_id']);
// $UserID = 1; // Assign SiteID for testing
?>

<?php
if (isset($_POST["returnsiteservice"])) {
    redirect_to("servicemainmenu.php?servicetype=$servicetype");
}
?>

<?php
$query = "SELECT user_id, i.item_id, `name`, num_request, num_provide, unit, status FROM request AS r join item AS i on i.item_id=r.item_id WHERE r.user_id=$UserID";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    // die("View outstanding requests failed.".mysqli_error($connection));
    echo "Cannot view requests.";
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<title> Requests Status</title>
</head>

<h4 style="text-align:center"> Requests Status</h4>
<body>
<table>
    <form action="" method="POST">
        <tr>
            <td><input type="submit" name="returnsiteservice" value="Go back to <?php echo $servicetype?>" /></td>
        </tr>
    </form>
</table>

<div>

    <?php
    // Print the column names as the headers of a table
    echo '<table cellpadding="0" border="1" style="margin-bottom:30px"> <tr>';
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
        echo "<td>{$row['num_request']}</td>";
        echo "<td>{$row['num_provide']}</td>";
        echo "<td>{$row['unit']}</td>";
        echo "<td style='width:80px;'>{$row['status']}</td>";
        $requserid = $row['user_id'];
        $reqitemid = $row['item_id'];
        $link = "edit_request.php?servicetype=".urlencode($servicetype)."&requserid=".$requserid."&reqitemid=".$reqitemid;
        echo '<td style="width:80px;"><a href='.$link.'>Cancel</a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>

</div>

<?php include("lib/footer.php"); ?>
