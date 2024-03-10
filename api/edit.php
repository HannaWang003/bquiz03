<?php
include_once "db.php";
$do=$_GET['do'];
$DB=${ucfirst($do)};
if($do=="poster"){
    foreach($_POST['id'] as $idx=>$id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
$DB->del($id);
        }
        else{
            $row = $DB->find($id);
            if(isset($_POST['sh']) && in_array($id,$_POST['sh'])){
                $row['sh']=1;
            }
            else{
                $row['sh']=0;
            }
            $row['text']=$_POST['text'][$idx];
            $DB->save($row);
        }
    }
}
if($do=="movie"){
    if(!empty($_FILES['poster']['tmp_name'])){
        move_uploaded_file($_FILES['poster']['tmp_name'],"../img/{$_FILES['poster']['name']}");
        $_POST['poster']=$_FILES['poster']['name'];
    }
    if(!empty($_FILES['movie']['tmp_name'])){
        move_uploaded_file($_FILES['movie']['tmp_name'],"../img/{$_FILES['movie']['name']}");
        $_POST['movie']=$_FILES['movie']['name'];
    }
    $DB->save($_POST);
}
to("../back.php?do=$do");


?>