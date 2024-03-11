<?php
include_once "db.php";
$ondate = $Movie->find($_GET['id'])['ondate'];
$today = strtotime(date("Y-m-d"));
$end = strtotime("+ 2days", strtotime($ondate));
$dif = ($end - $today) / (60 * 60 * 24);
for ($i = 0; $i <= $dif; $i++) {
    $str = date("Y-m-d", strtotime("+ $i days"));
    echo "<option value='$str'>$str</option>";
}
