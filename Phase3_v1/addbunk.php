<!--
 * Created by IntelliJ IDEA.
 * User: Yichen Zhu(yzhu421)
 * Date: 2017/4/1
 * Time: 23:39
 -->
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
// Find foodbank
$currentsession = $_SESSION['site_id'];
?>

<?php
if (isset($_POST["returneditservice"])) {
    redirect_to("editservice.php?servicetype=shelter");
}
?>

<?php
if (isset($_POST["addbunk"])) {
    $bunktype = $_POST["bunktype"];
    $count = $_POST["count"];
    $availablecount = $_POST["avcount"];

    $query = "INSERT INTO `bunk` (site_id , service_name, `type`, `count`, available_count) VALUES ( $currentsession , 'shelter', '{$bunktype}',{$count}, $availablecount)";
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Success
        redirect_to("addbunk.php");
    } else {
        // Failure
        die("Database query failed. " . mysqli_error($connection));
    }
    //redirect_to("addservice.php");
}
?>

<?php
$query = "SELECT `type` FROM `bunk` WHERE site_id = $currentsession AND service_name = 'shelter'";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$bunktype = [];
while ($bunk = mysqli_fetch_assoc($result)){
    $bunktype[] = $bunk["type"];
}


?>


<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>Add Bunk</title>
</head>

<h1> Add Bunk </h1>
<p>
<table>
    <form action="addbunk.php" method="POST">
        <tr>
            <td><input type="submit" name="returneditservice" value="Go back to Shelter Edit Page" /></td>
        </tr>
    </form>
</table>
</p>

<div>
    <form action="addbunk.php" method="POST">
        <p>Bunk Type:
            <select name="bunktype">
                <?php
                if (!in_array("male",$bunktype )) {
                    ?>
                    <option value="male">Male Only</option>
                    <?php
                }
                ?>

                <?php
                if (!in_array("female",$bunktype )) {
                    ?>
                    <option value="female">Female Only</option>
                    <?php
                }
                ?>

                <?php
                if (!in_array("mixed",$bunktype )) {
                ?>
                <option value="mixed">Mixed</option>
                <?php
                }
                ?>
            </select>
        </p>
        <p>Count:
            <input type="text" name="count" value="" />
        </p>

        <p>Available Count:
            <input type="text" name="avcount" value="" />
        </p>
        <input type="submit" name="addbunk" value="Add Bunk" />
    </form>
</div>





<?php include("lib/footer.php"); ?>
