<?php
include_once "db.php";
$movie=$Movie->find($_GET['movie'])['name'];
$date=$_GET['date'];
$today = date('Y-m-d');
$H=date('G');
$start = ($H>14 && $date==$today)?(6-ceil((24-$H)/2)):0;
for($i=$start;$i<5;$i++){
    $qt = $Order->sum('qt',['name'=>$movie,'date'=>$date,'session'=>$sess[$i]]);
    $lqt = 20-$qt;
    echo "<option value='$sess[$i]'>$sess[$i] - 剩餘票數 - $lqt 張</option>";
}


?>
