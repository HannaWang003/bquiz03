<?php
include_once "db.php";
$today = date('Y-m-d');
$orddate = date('Y-m-d',strtotime('-2 days'));
$rows = $Movie->all(" where `ondate` between '$orddate' AND '$today' and `sh`='1' order by rank");
foreach($rows as $row){
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}

?>
