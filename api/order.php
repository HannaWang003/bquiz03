<?php
include_once "db.php";
// dd($_POST);
// exit();
$id = $Order->max('id')+1;
$_POST['no'] = date("Ymd").sprintf("%04d",$id);
$_POST['seats']=serialize($_POST['seats']);
$Order->save($_POST);
echo $_POST['no'];


?>