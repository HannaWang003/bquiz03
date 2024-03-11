<?php
include_once "db.php";
$ondate = strtotime($Movie->find($_GET['id'])['ondate']);
$today = strtotime(date("Y-m-d"));
$enddate = strtotime("+ 2days", $ondate);
$diff = ($enddate - $today) / (60 * 60 * 24);
for ($i = 0; $i <= $diff; $i++) {
    $str = date("Y-m-d", strtotime("+ $i days"));
    echo "<option value='$str'>$str</option>";
}
