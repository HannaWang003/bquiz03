<?php
include_once "db.php";
$DB = ${$_GET['table']};
echo json_encode($DB->all("order by rank"));

?>