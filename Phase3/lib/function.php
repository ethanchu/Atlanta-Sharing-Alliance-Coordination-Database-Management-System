<?php
/**
 * Created by IntelliJ IDEA.
 * User: Yichen Zhu(yzhu421)
 * Date: 2017/4/1
 * Time: 23:42
 */
function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}


?>