<?php
include_once "db.php";
$today = date("Y-m-d");
$lastondate = date("Y-m-d", strtotime("-2 days"));
$rows = $Movie->all(" where `ondate` between '{$lastondate}' and '{$today}' AND `sh`='1'");
// echo json_encode($rows);
$html = "";
foreach ($rows as $row) {
    $sel = ($row['id'] == $_GET['id']) ? "selected" : "";
    $html .= "<option value='{$row['id']}' $sel>{$row['text']}</option>";
}
echo $html;
