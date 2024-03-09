<?php
//1
if(!isset($_SESSION['visited'])){
    if(($Total->cout())<=0){
        $row['total']=1;
    }else{
        $row=$Total->find(1);
        $row['total']++;
    }
    $Total->save($row);
    $_SESSION['visited']=1;
}
//page
$total = $DB->count(['sh'=>1]);
$div=5;
$pages=ceil($total/$div);
$now=($_GET['p'])??1;
$start = ($now-1)*$div;
$rows = $DB->all(['sh'=>1],"limit $start,$div");

if($now-1>0){
    $pre=$now-1;
    echo "<a href='$pre'> < </a>";
}
if($now+1<=$pages){
    $next=$now+1;
    echo "<a href='$next'> > </a>";
}
//content
$do=($_GET['do'])??"main";
$file="./front/$do.php";
if(file_exists(($file))){
    include $file;
}
else{
    include "./front/main.php";
}

CREATE TABLE `db03`.`test` 
(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `num` INT NOT NULL , `text` TEXT NOT NULL , 
    `date` DATE NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `db03`.`poster` 
(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `img` TEXT NOT NULL , 
    `text` TEXT NOT NULL , 
    `sh` INT NOT NULL , 
    `rank` INT NOT NULL , 
    `ani` INT NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `db03`.`movie` 
(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `text` TEXT NOT NULL , 
    `level` INT NOT NULL , 
    `length` TEXT NOT NULL , 
    `ondate` DATE NOT NULL ,
    `publish` TEXT NOT NULL , 
    `director` TEXT NOT NULL , 
    `movie` TEXT NOT NULL , 
    `poster` TEXT NOT NULL , 
    `intro` TEXT NOT NULL , 
    `sh` INT NOT NULL , 
    `rank` INT NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `db03`.`order` 
(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
    `no` TEXT NOT NULL , 
    `text` TEXT NOT NULL , 
    `date` DATE NOT NULL ,
    `session` TEXT NOT NULL , 
    `qt` INT NOT NULL , 
    `seats` TEXT NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

?>