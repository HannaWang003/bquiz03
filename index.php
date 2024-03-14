<?php
include_once "./api/db.php";
?>
<script src="./jquery-1.9.1.min.js"></script>
<h1>預告片介紹</h1>
<style>
    #lists{
        width:430px;
        height:360px;
        background:red;
        overflow:hidden;
        text-align:center;
    }
    .list{
        display:none;
    }
    .list img{
        height:100%;
    }
    #btns{
        width:360px;
        height:100px;
        display:flex;
        overflow:hidden;
        position:relative;
    }
   .btn{
        width:90px;
        height:100px;
        flex-shrink:0;
        text-align:center;
        position:relative;
    }
    .btn img{
        width:60px;

    }
    .left{
        width:0;
        border:20px solid #000;
        border-top-color:transparent;
        border-bottom-color:transparent;
        border-left-width: 0;
    }
    .right{
        width:0;
        border:20px solid #000;
        border-top-color:transparent;
        border-bottom-color:transparent;
        border-right-width: 0;
    }
    #controls{
        display:flex;
        align-items:center;
    }
</style>
<div id="lists">
    <?php
$posters = $Poster->all(['sh'=>1]);
foreach($posters as $poster){
    ?>
    <div class="list" data-ani="<?=$poster['ani']?>">
        <img src="./img/<?=$poster['poster']?>" alt="">
    </div>
    <?php
}

?>
</div>
<div id="controls">
    <div class="left"></div>
<div id="btns">
    <?php
    foreach($posters as $poster){
        ?>
<div class="btn"><img src="./img/<?=$poster['poster']?>" alt=""></div>
        <?php
    }
    ?>
</div>
<div class="right"></div>
</div>
<script>
$(".list").eq(0).show();
let total = $('.list').length
let p=0;
$(".left,.right").on('click',function(){
let arrow = $(this).attr('class');
switch(arrow){
    case "left":
        if(p-1>=0){
            p--
        }
        break;
    case "right":
        if(p+1<=total-4){
            p++
        }
        break
}
$('.btn').animate({right:90*p});
})
let now=0;
let next=0;
let timer = setInterval(slide,3000);
function slide(n){
    let ani = $('.list').eq(now).data('ani');
    if(typeof(n)=="undefined"){
next=now+1;
if(next>=total){
    next=0;
}
}else{
    next=n;
}
switch(ani){
    case 1:
        $('.list').eq(now).fadeOut(1000,function(){
            $('.list').eq(next).fadeIn(1000)
        })
        break;
    case 2:
        $('.list').eq(now).hide(1000,function(){
            $('.list').eq(next).show(1000)
        })
        break;
    case 3:
        $('.list').eq(now).slideUp(1000,function(){
            $('.list').eq(next).slideDown(1000)
        })
        break;
}
now=next;
}
$('#btns').hover(function(){
    clearInterval(timer)
},function(){
    timer = setInterval(slide,3000)
})
$('.btn').on('click',function(){
    let idx = $(this).index();
    slide(idx)
})
</script>
