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
    $userid = $_SESSION['user_id'];
    $query = "SELECT `site_id` FROM `user` WHERE user_id =$userid";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query for site_id failed.");
    }
    $siteid = mysqli_fetch_assoc($result);
    $_SESSION['site_id'] = $siteid["site_id"];
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

<?php
if (isset($_POST["foodbankmainmenu"])) {
    redirect_to("FBmainmenu.php");
}
?>

<?php
if (isset($_POST["foodpantrymainmenu"])) {
    redirect_to("servicemainmenu.php?servicetype=FoodPantry");
}
?>

<?php
if (isset($_POST["sheltermainmenu"])) {
    redirect_to("servicemainmenu.php?servicetype=Shelter");
}
?>

<?php
if (isset($_POST["soupkitchenmainmenu"])) {
    redirect_to("servicemainmenu.php?servicetype=SoupKitchen");
}
?>


<?php
if (isset($_POST["logout"])) {
    redirect_to("logout.php");
}
?>

<?php
if (isset($_POST["waitlistreport"])) {
    redirect_to("waitlistreport.php");
}
?>

<!-- Html Layout Part   -->
<?php include("lib/header.php"); ?>
<link rel="stylesheet" type="text/css" href="site.css">
<title>Site Service</title>
</head>

<div class="center">
<h1 style="text-align:center"> Site Service </h1>
<p>
    <table>
        <form action="siteservice.php" method="POST">
            <tr>
                <td><input type="submit" name="addservice" value="Add Service" /></td>
                <td><input type="submit" name="waitlistreport" value="Waitlist Report" /></td>
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
       <tr><td>
        <form action="siteservice.php" method="POST">
            <input style="text-align: center;" type="submit" name="foodbankmainmenu" value="Foodbank Mainmenu" /> </form></td>
       <td> edit </td>
              <?php
                if ($servicenum > 1) {
                    ?>
              <td> <a href="deleteservice.php?servicetype=<?php echo rawurlencode("foodbank"); ?>"  onclick="return confirm('Delete the service?');"> delete </a></td>
              <?php
                }
                ?>
             </tr>
        <?php
        }
    ?>
    </table>

    <table>
    <?php
    if(isset($foodpantry)) {
        ?>
        <tr><td>
        <form action="siteservice.php" method="POST">
            <input  type="submit" name="foodpantrymainmenu" value="Foodpantry Mainmenu" /> </form></td>
        <td> <a href="editservice.php?servicetype=<?php echo rawurlencode("foodpantry"); ?>" > edit </a></td>
        <?php
        if ($servicenum > 1) {
            ?>
            <td> <a href="deleteservice.php?servicetype=<?php echo rawurlencode("foodpantry"); ?>"  onclick="return confirm('Delete the service?');"> delete </a></td>
            <?php
        }
        ?>
        </tr>
        <?php
        }
    ?>
    </table>

    <table>
    <?php
    if(isset($shelter)) {
        ?>
        <tr><td>
        <form action="siteservice.php" method="POST">
            <input type="submit" name="sheltermainmenu" value="Shelter Mainmenu" /></form></td>
        <td style="text-align: center;"> <a href="editservice.php?servicetype=<?php echo rawurlencode("shelter"); ?>" > edit </a></td>
        <?php
        if ($servicenum > 1) {
            ?>
            <td style="text-align: center;"> <a href="deleteservice.php?servicetype=<?php echo rawurlencode("shelter"); ?>"  onclick="return confirm('Delete the service?');"> delete </a></td>
            <?php
        }
        ?>
        </tr>
        <?php
    }
    ?>
    </table>

    <table>
    <?php
    if(isset($soupkitchen)) {
        ?>
        <tr><td>
        <form action="siteservice.php" method="POST">
            <input type="submit" name="soupkitchenmainmenu" value="Soupkitchen Mainmenu" /></form></td>
        <td> <a href="editservice.php?servicetype=<?php echo rawurlencode("soupkitchen"); ?>" > edit </a></td>
        <?php
        if ($servicenum > 1) {
            ?>
            <td> <a href="deleteservice.php?servicetype=<?php echo rawurlencode("soupkitchen"); ?>"  onclick="return confirm('Delete the service?');"> delete </a></td>
            <?php
        }
        ?>
        </tr>
        <?php
    }
    ?>
    </table>

</p>

</div>

<?php include("lib/footer.php"); ?>