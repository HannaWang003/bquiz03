<?php
include_once "db.php";
$DB=${ucfirst($_POST['table'])};
echo $DB->del($_POST['id']);

?>