<!--
 * Created by IntelliJ IDEA.
 * User: Yichen Zhu(yzhu421)
 * Date: 2017/4/1
 * Time: 23:39
 -->
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
if (isset($_POST["returnmainsite"])) {
    redirect_to("siteservice.php"); // Later relink to shelter main menu.
}
?>

<?php
// Retrive the previous info
//SELECT * FROM WaitList WHERE Site_ID = ‘$Site_ID’ AND Service_Name = ‘Shelter’ ORDER BY Waitinglist_Ranking ASC;
$query = "SELECT site_id, service_name, COUNT(*) AS num FROM waitlist GROUP BY site_id, service_name";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Waitlist Report failed.");
}
?>



<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<title>View/Edit Waitlist</title>
</head>

<div class="center">
<h1 style="text-align: center"> Waitlist Report </h1>
<p>
<table>
    <form action="" method="POST">
        <tr>
            <td><input style="width: 200px" type="submit" name="returnmainsite" value="Go back to Main Site" /></td>
        </tr>
    </form>
</table>
</p>

<p>
    <table border="1">
        <tr>
            <th> Site ID </th>
            <th> Service Name </th>
            <th> Waitlist Number </th>
        </tr>
    <?php
        while ($wl_item = mysqli_fetch_assoc($result) ) {
    ?>
            <tr>
                <form action="editwaitlist.php" method="POST">
                <td> <input type="text" style="text-align:center;" name="Site_id" value="<?php echo $wl_item["site_id"] ?>" readonly  /> </td>
                <td> <input type="text" style="text-align:center;" name="Service Name" value="<?php echo $wl_item["service_name"] ?>"  /></td>
                <td> <input type="text" style="text-align:center;" name="Length of Waitlist" value="<?php echo $wl_item["num"] ?>"  /></td>
                </form>
            </tr>
    <?php
    }
    ?>
    </table>
</p>


</div>




<?php include("lib/footer.php"); ?>
