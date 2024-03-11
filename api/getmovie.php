<?php
include_once "db.php";
$today = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("- 2days"));
$rows = $Movie->all(" where `ondate` between '$ondate' AND '$today' and `sh`='1' order by rank");
foreach ($rows as $row) {
    $select = ($row['id'] == $_GET['id']) ? "selected" : "";
    echo "<option value='{$row['id']}' $select>{$row['text']}</option>";
}
