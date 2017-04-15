<!--
 * Created by IntelliJ IDEA .
 * User: Yichen Zhu(yzhu421)
* Date: 2017 / 4 / 9
* Time: 18:06
-->
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>


<?php
$servicetype =  $_GET["servicetype"];
?>

<?php
if (isset($_POST["clientsearch"])) {
    redirect_to("client.php"); // Need to link to Lifeng' part in the future
}
?>

<?php
if (isset($_POST["sitesevice"])) {
    redirect_to("siteservice.php");
}
?>

<?php
if (isset($_POST["itemsearch"])) {
    redirect_to("itemsearch.php"); // Need to link to itemsearch
}
?>


<?php
if (isset($_POST["requeststatusreport"])) {
    redirect_to("view_request.php"); //Need to link to itemsearch
}
?>

<?php
if (isset($_POST["waitlist"])) {
    redirect_to("editwaitlist.php"); // Need to link to waitlist
}
?>

<?php
if (isset($_POST["bunkroomform"])) {
    redirect_to("BunkUser.php"); //Need to link to bunkroomform
}
?>
<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<title><?php echo $servicetype?>&nbsp; Main Menu</title>
</head>

<p class="center">
<h1 style="text-align: center;"> <?php echo $servicetype?>&nbsp; Main Menu </h1>
<p>
<table>
    <form action="servicemainmenu.php" method="POST">
        <tr>
            <td><input type="submit" name="clientsearch" value="Client Search" /></td>
            <td><input type="submit" name="sitesevice" value="Go back to Site Service" /></td>
        </tr>
    </form>
</table>
    </p>

    <p>
    <table>
    <form action="servicemainmenu.php" method="POST">
            <tr><th><input type="submit" name="itemsearch" value="Items Search/Edit" /></th></tr>
            <tr><th><input type="submit" name="requeststatusreport" value="Request Status Report" /></th></tr>
        <?php
        if ($servicetype == "Shelter") {
            ?>
            <tr><th><input type="submit" name="waitlist" value="View/Edit Waitlist" /></th></tr>
            <tr><th><input style="width: 300px;" type="submit" name="bunkroomform" value="View/Edit Available Bunks/Rooms Form--For User" /></th></tr>
            <?php
        }
        ?>
    </form>
    </table>


</div>

<?php include("lib/footer.php"); ?>