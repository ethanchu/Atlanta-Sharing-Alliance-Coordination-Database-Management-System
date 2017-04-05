<!--
 * Created by IntelliJ IDEA.
 * User: Yichen Zhu(yzhu421)
 * Date: 2017/4/1
 * Time: 23:39
 -->
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
// Use _Session[user_id] to retrieve the site_id
    $_SESSION['site_id'] = 1;
?>

<?php
// Find foodbank
$currentsession = $_SESSION['site_id'];
$servicenum = 0;
$query = "SELECT * FROM `foodbank` WHERE site_id = $currentsession";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$foodbank = mysqli_fetch_assoc($result);
if (isset($foodbank)) {
    $servicenum++;
}

// Find foodpantry
$query = "SELECT * FROM `foodpantry` WHERE site_id = $currentsession";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$foodpantry = mysqli_fetch_assoc($result);
if (isset($foodpantry)) {
    $servicenum++;
}

// Find shelter
$query = "SELECT * FROM `shelter` WHERE site_id = $currentsession";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$shelter = mysqli_fetch_assoc($result);
if (isset($shelter)) {
    $servicenum++;
}

// Find soupkitchen
$query = "SELECT * FROM `soupkitchen` WHERE site_id = $currentsession";
// Test if there was a query error
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed.");
}
$soupkitchen = mysqli_fetch_assoc($result);
if (isset($soupkitchen)) {
    $servicenum++;
}
?>

<?php
if (isset($_POST["addservice"])) {
    redirect_to("addservice.php");
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>

<title>Site Service</title>
</head>

<h1> Site Service </h1>
<p>
    <table>
        <form action="siteservice.php" method="POST">
            <tr>
                <td><input type="submit" name="addservice" value="Add Service" /></td>
                <td><input type="submit" name="logout" value="Log Out" /></td>
            </tr>
        </form>
    </table>
</p>

<p>

    <table>
    <?php
          if(isset($foodbank)) {
       ?>
       <tr><input type="submit" name="foodbankmainmenu" value="Foodbank Mainmenu" /></tr>
       <tr> edit </tr>
              <?php
                if ($servicenum > 1) {
                    ?>
              <tr> <a href="deleteservice.php?servicetype=<?php echo rawurlencode("foodbank"); ?>"  onclick="return confirm('Delete the service?');"> delete </a></tr>
              <?php
                }
                ?>
        <?php
        }
    ?>
    </table>

    <table>
    <?php
    if(isset($foodpantry)) {
        ?>
        <tr><input type="submit" name="foodpantrymainmenu" value="Foodpantry Mainmenu" /> </tr>
        <tr> <a href="editservice.php?servicetype=<?php echo rawurlencode("foodpantry"); ?>" > edit </a></tr>
        <?php
        if ($servicenum > 1) {
            ?>
            <tr> <a href="deleteservice.php?servicetype=<?php echo rawurlencode("foodpantry"); ?>"  onclick="return confirm('Delete the service?');"> delete </a></tr>
            <?php
        }
        ?>
        <?php
        }
    ?>
    </table>

    <table>
    <?php
    if(isset($shelter)) {
        ?>
        <tr><input type="submit" name="sheltermainmenu" value="Shelter Mainmenu" /></tr>
        <tr> <a href="editservice.php?servicetype=<?php echo rawurlencode("shelter"); ?>" > edit </a></tr>
        <?php
        if ($servicenum > 1) {
            ?>
            <tr> <a href="deleteservice.php?servicetype=<?php echo rawurlencode("shelter"); ?>"  onclick="return confirm('Delete the service?');"> delete </a></tr>
            <?php
        }
        ?>
        <?php
    }
    ?>
    </table>

    <table>
    <?php
    if(isset($soupkitchen)) {
        ?>
        <tr><input type="submit" name="soupkitchenmainmenu" value="Soupkitchen Mainmenu" /></tr>
        <tr> <a href="editservice.php?servicetype=<?php echo rawurlencode("soupkitchen"); ?>" > edit </a></tr>
        <?php
        if ($servicenum > 1) {
            ?>
            <tr> <a href="deleteservice.php?servicetype=<?php echo rawurlencode("soupkitchen"); ?>"  onclick="return confirm('Delete the service?');"> delete </a></tr>
            <?php
        }
        ?>
        <?php
    }
    ?>
    </table>

</p>


<?php include("lib/footer.php"); ?>