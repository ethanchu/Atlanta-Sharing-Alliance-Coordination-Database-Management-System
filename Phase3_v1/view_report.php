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
?>

// Need Yichen's editservice.php
<?php
if (isset($_POST["returneditservice"])) {
    redirect_to("editservice.php?servicetype=foodbank");
}
?>

<?php
if (isset($_POST["view_report"])) {
    $query = "SELECT name, r.num_request, unit, storage_type, category, sub_category
FROM Item AS I join Request AS r on i.item_ID=r.item_ID and i.site_id=r.site_id where r.site_id=$SiteID";
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        redirect_to("view_report.php");
    } else {
        // Failure
        die("Database query failed. " . mysqli_error($connection));
    }
    //redirect_to("addservice.php");
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>View Outstanding Requests</title>
</head>

<h1> View Outstanding Requests </h1>
<p>
<table>
    <form action="view_report.php" method="POST">
        <tr>
            <td><input type="submit" name="returneditservice" value="Go back to FoodBank Edit Page" /></td>
        </tr>
    </form>
</table>
</p>

<?php include("lib/footer.php"); ?>
