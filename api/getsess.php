<?php
include_once "db.php";
$movieName = $Movie->find($_GET['movie'])['text'];
$choiceDate = $_GET['date'];
$today = date("Y-m-d");
$H = date("G");
$startSess = ($H >= 14 && $choiceDate == $today) ? 6 - ceil((24 - $H) / 2) : 0;
for ($i = $startSess; $i < 5; $i++) {
    $qt = $Order->sum('qt', ['text' => $movieName, 'date' => $choiceDate, 'session' => $sess[$i]]);
    $lqt = 20 - $qt;
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位 $lqt</option>";
}
