<!--
 * Created by IntelliJ IDEA.
 * User: Yichen Zhu(yzhu421)
 * Date: 2017/4/1
 * Time: 23:39
 -->
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
if (isset($_POST["returnsheltermainmenu"])) {
    redirect_to("servicemainmenu.php?servicetype=Shelter"); // Later relink to shelter main menu.
}
?>

<?php
$currentsession = $_SESSION['site_id'];
$curclientidarray = [];
?>

<?php
// Update info for site service
if (isset($_POST["editwaitlist"])) {
    $client_id = $_POST["client_id"];
    $waitinglist_ranking = $_POST["waitinglist_ranking"];
    $datetime = $_POST["datetime"];
    //UPDATE WaitList SET Waitinglist_Ranking = Waitinglist_Ranking-1 WHERE Site_ID = ‘$Site_ID’ AND Service_Name = ‘Shelter’’ AND Client_ID = ‘$Client_ID’;
    $query = "UPDATE waitlist SET waitinglist_ranking = $waitinglist_ranking WHERE site_id = $currentsession AND service_name = 'shelter' AND 	client_id = $client_id";

    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        redirect_to("editwaitlist.php");
    } else {
        // Failure
        die("Waitlist update failed. " . mysqli_error($connection));
    }
}
elseif (isset($_POST["deletewaitlist"])){
    $client_id = $_POST["client_id"];
    //Delete FROM WaitList WHERE Site_ID = $Site_ID AND Service_Name = ‘Shelter’ AND Client_ID = ‘$Client_ID’;
    $query = "Delete FROM waitlist WHERE site_id = $currentsession AND service_name = 'shelter' AND 	client_id = $client_id ";
    $result = mysqli_query($connection, $query);
    if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        redirect_to("editwaitlist.php");
    } else {
        // Failure
        die("Waitlist delete failed. " . mysqli_error($connection));
    }
}
elseif (isset($_POST["addwaitlist"])) {
    $client_id = $_POST["client_id"];
    $waitinglist_ranking = $_POST["waitinglist_ranking"];
    $date = date('Y-m-d H:i:s');
    //INSERT INTO WaitList (Site_ID, Service Name, Client_ID, Waitinglist_Ranking, DateTime)VALUES(‘$Site_ID’, ‘Shelter’’,’$Client_ID’, ‘$Waitinglist_Ranking’, ‘$DateTime’) ;
    $query = "INSERT INTO waitlist (site_id, service_name, client_id, waitinglist_ranking, datetime) VALUES ($currentsession, 'shelter', $client_id, $waitinglist_ranking, '$date')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        redirect_to("editwaitlist.php");
    } else {
        // Failure
        die("Waitlist insert failed. " . mysqli_error($connection));
    }
}
?>



<?php
// Retrive the previous info
//SELECT * FROM WaitList WHERE Site_ID = ‘$Site_ID’ AND Service_Name = ‘Shelter’ ORDER BY Waitinglist_Ranking ASC;
$query = "SELECT * FROM waitlist WHERE Site_ID = $currentsession AND service_name = 'shelter' ORDER BY waitinglist_ranking ASC, datetime ASC";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Waitlist select failed.");
}
?>



<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<title>View/Edit Waitlist</title>
</head>

<div class="center">
<h1 style="text-align: center"> View/Edit Waitlist </h1>
<p>
<table>
    <form action="editwaitlist.php" method="POST">
        <tr>
            <td><input style="width: 200px" type="submit" name="returnsheltermainmenu" value="Go back to Shelter Main Menu" /></td>
        </tr>
    </form>
</table>
</p>

<p>
    <table border="1">
        <tr>
            <th> Client ID </th>
            <th> Client Name </th>
            <th> Waitlist Ranking </th>
            <th> Register Time </th>
        </tr>
    <?php
        while ($wl_item = mysqli_fetch_assoc($result) ) {
    ?>
            <tr>
                <form action="editwaitlist.php" method="POST">
                <td> <input type="text" style="text-align:center;" name="client_id" value="<?php echo $wl_item["client_id"] ?>" readonly  /> </td>
                <td> <?php
                    $curclientid = $wl_item["client_id"];
                    $curclientidarray[] = $curclientid;
                    $query = "SELECT name FROM `client` WHERE client_id = $curclientid";
                    $curclientresult = mysqli_query($connection, $query);
                    if (!$curclientresult) {
                        die("Database query for client name failed.");
                    }
                    $curclient = mysqli_fetch_assoc($curclientresult);
                    ?>
                    <input type="text" style="text-align:center;" name="clientname" value="<?php echo $curclient["name"] ?>" readonly />
                </td>
                <td> <input type="text" style="text-align:center;" name="waitinglist_ranking" value="<?php echo $wl_item["waitinglist_ranking"] ?>"  /></td>
                <td> <input type="text" style="text-align:center;" name="datetime" value="<?php echo $wl_item["datetime"] ?>"  /></td>
                <td> <input type="submit" name="editwaitlist" value="Edit" /></td>
                <td> <input type="submit" name="deletewaitlist" value="Delete" /></td>
                </form>
            </tr>
    <?php
    }
    ?>
    </table>
</p>

<h4 style="text-align:center; margin-top:30px"> Add Waitlist </h4>
<p>
    <table border="1">
        <tr>
            <th> Client ID </th>
            <th> Waitlist Ranking </th>
            <th> Action </th>
        </tr>

        <tr>
            <form action="editwaitlist.php" method="POST">
                <td>
                <select name="client_id">
                    <?php
                        $query = "SELECT client_id FROM `client`";
                        $result = mysqli_query($connection, $query);
                        while ($allclient = mysqli_fetch_assoc($result) ) {
                    ?>
                            <?php
                            if (!in_array($allclient["client_id"], $curclientidarray)) {

                            ?>
                            <option value="<?php echo $allclient["client_id"]?>"><?php echo $allclient["client_id"];?></option>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?>
                </select>
                </td>
                <td> <input type="text" style="text-align:center;" name="waitinglist_ranking" value=""  /></td>
                <td> <input type="submit" name="addwaitlist" value="Add" /></td>
            </form>
        </tr>
    </table>
</p>
</div>




<?php include("lib/footer.php"); ?>
