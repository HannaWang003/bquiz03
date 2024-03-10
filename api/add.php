<?php
include_once "db.php";
$do=$_GET['do'];
$DB=${ucfirst($do)};
if($do=='poster'){
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"./img/{$_FILES['img']['name']}");
    $_POST['img']=$_FILES['img']['name'];
}
$ani = rand(1,3);
$_POST['ani']=$ani;
$rank = $DB->max('rank')+1;
$_POST['rank']=$rank;
$_POST['sh']=1;
$DB->save($_POST);
}
if($do=='movie'){
    if(isset($_FILES['poster']['tmp_name'])){
        move_uploaded_file($_FILES['poster']['tmp_name'],"../img/".$_FILES['poster']['name']);
        $_POST['poster']=$_FILES['poster']['name'];
    }
    if(isset($_FILES['movie']['tmp_name'])){
        move_uploaded_file($_FILES['movie']['tmp_name'],"../img/".$_FILES['movie']['name']);
        $_POST['movie']=$_FILES['movie']['name'];
    }
    $_POST['sh']=1;
    $rank = $DB->max('rank')+1;
    $_POST['rank']=$rank;
    $DB->save($_POST);
}
to("../back.php?do=$do");
?>