<?php
include_once "db.php";
$DB = ${ucfirst($_POST['table'])};
$row = $DB->find($_POST['id']);
echo $row['sh']=($row['sh']+1)%2;
$DB->save($row);

?>