<?php
include_once "db.php";
$ondate=strtotime($Movie->find($_GET['id'])['ondate']);
$lastdate=strtotime('+ 2days',$ondate);
$today = strtotime(date('Y-m-d'));
$diff=($lastdate-$today)/(60*60*24);
for($i=0;$i<=$diff;$i++){
    $str = date("Y-m-d",strtotime("+ $i days"));
    echo "<option value='$str'>$str</option>";
}

?>
