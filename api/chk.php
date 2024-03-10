<?php
include_once "db.php";
if($_POST['acc']=='admin' && $_POST['pw']=='1234'){
    $_SESSION['mag']='admin';
    to("../back.php");
}else{
    to("../index.php?do=login&error=輸入錯誤");
}

?>