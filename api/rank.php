<?php
include_once "db.php";
$do=$_POST['db'];
$DB=${ucfirst($do)};
$now = $DB->find($_POST['id']);
$tmp=$now['rank'];
$ch = $DB->find($_POST['ch']);
$now['rank']=$ch['rank'];
$ch['rank']=$tmp;
$DB->save($now);
$DB->save($ch);
?>