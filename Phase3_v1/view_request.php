/**
* Created by IntelliJ IDEA.
* User: mjnchen
* Date: 4/8/17
* Time: 12:42 AM
*/
// Need test
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
// Find site_id of foodbank
$SiteID = $_SESSION['site_id'];
$UserID = $_SESSION['user_id'];
?>

// Need Yichen's editservice.php
<?php
if (isset($_POST["returneditservice"])) {
    redirect_to("editservice.php?servicetype=foodbank");
}
?>

<?php
if (isset($_POST["view_request"])) {
    $query = "SELECT i.name, r.num_request, r.num_provide, r.status FROM Request AS r join Item AS i on i.item_id=r.item_id WHERE r.user_id=$UserID;";
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

<title>View Requests</title>
</head>

<h1> View Requests </h1>
<p>
<table>
    <form action="view_request.php" method="POST">
        <tr>
            <td><input type="submit" name="returneditservice" value="Go back to Service Page" /></td>
        </tr>
    </form>
</table>
</p>

<?php include("lib/footer.php"); ?>
