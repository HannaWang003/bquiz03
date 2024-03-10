<?php
$do=$_GET['do'];
$DB=${ucfirst($do)};
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

INSERT INTO `poster` 
(`id`, `img`, `text`, `sh`, `rank`, `ani`) 
VALUES 
(NULL, '03A02.jpg', '預告片2', '1', '2', '1'),
(NULL, '03A03.jpg', '預告片3', '1', '3', '1'),
(NULL, '03A04.jpg', '預告片4', '1', '4', '1');

INSERT INTO `movie` 
(`id`, `text`, `level`, `length`, `ondate`, `publish`, `director`, `movie`, `poster`, `intro`, `sh`, `rank`) 
VALUES 
(NULL, '神山大冒險', '1', '1:40', '2024-03-10', '泰山職訓', '泰山職訓', '03B02v.mp4', '03B02v.png', '神山大冒險......', '1', '2'),
(NULL, '花物語', '1', '1:40', '2024-03-10', '泰山職訓', '泰山職訓', '03B03v.mp4', '03B03v.png', '花物語......', '1', '3'),
(NULL, '廚神異想世界', '1', '1:40', '2024-03-10', '泰山職訓', '泰山職訓', '03B04v.mp4', '03B04v.png', '廚神異想世界......', '1', '4');



?>
<style>
    /* 按鈕 */
    .left,.right{
    width:0px;
    border:20px solid #000;
    border-top-color:transparent;
    border-bottom-color:transparent;
  }
  .left{
    border-left-width:0;
  }
  .right{
    border-right-width:0;
  }
</style>
<script>
    $('.list').eq(0).show();
let total=$('.btn').length;
let p=0;
$('.left,.right').on('click',function(){
    let arrow = $(this).attr('class');
    switch(arrow){
        case "left":
            if(p-1>=0){
                p--;
            }
            break;
        case "right":
            if(p+1<=total-4){
                p++;
            }
            break;
    }
    $(".btn").animate({right:90*p});
})
</script>