<?php
include_once "db.php";
$total = $Movie->count(['sh'=>1]);
$div = 4;
$nowpage = $_GET['nowpage'];
$pages = ceil($total/$div);
$start = ($nowpage-1)*$div+1;
$rows = $Movie->all(" where `sh`=1 order by rank limit $start,$div");
$res = [
    'res'=>$rows,
    'pages'=>$pages,
];
echo json_encode($res);



?>