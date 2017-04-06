<!--
 * Created by IntelliJ IDEA.
 * User: Yichen Zhu(yzhu421)
 * Date: 2017/4/1
 * Time: 23:39
 -->
<?php require_once("lib/db_connection.php"); ?>
<?php require_once("lib/function.php"); ?>

<?php
        $servicetype = $_GET['servicetype'];
        $currentsession = $_SESSION['site_id'];
        $query = "Delete FROM {$servicetype} WHERE Site_ID = $currentsession AND Service_Name = '{$servicetype}' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) == 1) {
            // Success
             redirect_to("siteservice.php");
        } else {
            // Failure
             $message = "Subject delete failed";
        }
?>

