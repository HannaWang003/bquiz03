<?php
include_once "db.php";
$data[$_POST['type']]=$_POST['val'];
$Order->del($data);

?>