<?php
// echo json_encode($_POST);
include_once "db.php";
$now=$Poster->find($_POST['now']);
$tmp = $now['rank'];
$sw=$Poster->find($_POST['sw']);
$now['rank']=$sw['rank'];
$sw['rank']=$tmp;
$Poster->save($now);
$Poster->save($sw);
?>