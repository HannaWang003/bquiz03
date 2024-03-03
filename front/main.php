
<style>
    .lists{
        text-align:center;
        width:430px;
        height:380px;
    }
    .item{
        box-sizing:border-box;
        display:none;
    }
    .left,.right{
        width:0;
        border:20px solid black;
        border-top-color:transparent;
        border-bottom-color:transparent;
    }
    .left{
        border-left-width:0;
    }
    .right{
        border-right-width:0;
    }
    .btns{
        width:360px;
        height:100px;
        display:flex;
        overflow:hidden;
    }
    .btn img{
        width:60px;
        height:80px;
    }
    .btn{
        font-size:12px;
        text-align:center;
        flex-shrink:0;
        width:90px;
        position:relative;
    }
    .controls{
        width:420px;
        height:100px;
        position:relative;
        margin-top:10px;
        display:flex;
        align-items:center;
        justify-content:space-between;
    }
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
            <div class="lists">
                <?php
$posters=$Poster->all(['sh'=>1]," order by rank ");
foreach($posters as $poster){
    ?>
<div class="item" data-ani="<?=$poster['ani']?>">
    <div><img src="./img/<?=$poster['img']?>"></div>
    <div><?=$poster['name']?></div>
</div>
<?php
}
?>
            </div>
            <div class="controls">
                <div class="left"></div>
                <div class="btns">
                    <?php
foreach($posters as $idx=>$poster){
    ?>
<div class="btn">
    <div><img src="./img/<?=$poster['img']?>"></div>
    <div><?=$poster['name']?></div>
</div>

    <?php
}
?>
                </div>
                <div class="right"></div>
</div>
    </div>
</div>
<script>
    $(".item").eq(0).show();
    let total=$(".btn").length;
//輪播程式
let now=0;
let timer = setInterval(()=>{slide()},3000);
function slide(){
    let ani=$(".item").eq(now).data("ani");
    let next=now+1;
    if(next>total){
        next=0
    }
    switch(ani){
        case 1:
        $(".item").eq(now).$('img').fadeOut(1000,function(){
            $(".item").eq(next).fadeIn(1000);
        });
        break;
        case 2:
            $(".item").eq(now).hide(1000,function(){
                $(".item").eq(next).show(1000);
            })
            break;
            case 3:
                $(".item").eq(now).slideUp(1000,function(){
                    $(".item").eq(next).slideDown(1000);
                })
                break;
    }
    now=next;
    
}
    //左右移動程式
    let p=0;
    $(".left,.right").on("click",function(){
        let arrow=$(this).attr('class');
        switch(arrow){
            case "right":
                if(p+1<=(total-4)){
                    p=p+1;
                }
                break;
            case "left":
                if(p-1>=0){
                    p=p-1;
                }
                break;
        }
        $('.btn').animate({right:90*p})
    })
</script>
    <style>
        .movie{
            width:100%;
            display:flex;
        }
        .poster{
            object-fit:cover;
            width:60px;
            height:80px;
            padding:5px;
            background:#fff;
        }
        button{
            margin:3px;
            padding:5px 10px;
        }
    </style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
    <div style="display:flex;justify-content:space-between;flex-wrap:wrap;">
 <?php
 $today=date("Y-m-d");
 $ondate=date("Y-m-d",strtotime("-2 days"));
 $total=$Movie->count(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1");
 $div=4;
 $pages=ceil($total/$div);
 $now=($_GET['p'])??1;
 $start = ($now-1)*$div;
 $rows = $Movie->all(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1 order by rank limit $start,$div");
foreach($rows as $row){        
    ?>
<div style="width:48%;border:1px solid #eee;padding:2px;margin:5px 0;border-radius:5px;">
<div class="movie">
    <div><img src="./img/<?=$row['poster']?>" class="poster"></div>
    <div>
        <div><?=$row['name']?></div>
        <div style='font-size:13px;padding:5px 0'>分級:<img src="./icon/03C0<?=$row['level']?>.png" style="width:20px"></div>
        <div style='font-size:13px;padding:5px 0'>上映日期:<?=$row['ondate']?></div>
    </div>
</div>
<div class='ct'>
    <button onclick="intro(this)" data-id="<?=$row['id']?>">劇情簡介</button>
    <button onclick="location.href='?do=order&id=<?=$row['id']?>'">線上訂票</button>
</div>
</div>
<?php
}    
?>
</div>
<div class="ct">
    <?php
for($i=1;$i<=$pages;$i++){
    $style = ($i==$now)?"font-size:20px":"";
    echo "<a href='?do=movie&p=$i' style='color:#fff;padding:5px;$style'>$i</a>";
}
    ?>
        </div>
    </div>
</div>
<script>
    function intro(elm){
        let id=$(elm).data('id');

        $.post('./front/intro.php',{id},function(res){
            $('#mm').html(res);
        })
    }
</script>