<?php
include_once "db.php";
$_POST['seats'] = serialize($_POST['seats']);
$_POST['no'] = date("Ymd") . rand(100000, 999999);
$Order->save($_POST);
echo $_POST['no'];
