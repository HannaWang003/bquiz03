<?php
include_once "db.php";
echo json_encode($_POST);
foreach($_POST['id'] as $idx=>$val){
    if(isset($_POST['del']) && in_array($val,$_POST['del'])){
        $Poster->del($val);
    }
    else{
        $row = $Poster->find($val);
        $row['name']=$_POST['name'][$idx];
        $row['sh']=(in_array($val,$_POST['sh']))?1:0;
        $row['ani']=$_POST['ani'][$idx];
        $Poster->save($row);
    }
}

?>