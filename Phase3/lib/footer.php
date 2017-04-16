<div id="footer">Copyright <?php echo date("Y"); ?>, 6400Spring17team22</div>
<!--
 * Created by IntelliJ IDEA.
 * User: Yichen Zhu(yzhu421)
 * Date: 2017/4/1
 * Time: 23:36
 -->
</body>
</html>
<?php
// 5. Close database connection
if (isset($connection)) {
    mysqli_close($connection);
}
?>
