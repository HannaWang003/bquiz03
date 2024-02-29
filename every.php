<?php
$do=($_GET['do'])??"main";
$file="./front/{$do}.php";
if(file_exists($file)){
  include $file;
}else{
  include "./front/main.php";
}
?>