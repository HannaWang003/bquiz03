
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <ul class="lists">
            </ul>
            <ul class="controls">
            </ul>
        </div>
    </div>
</div>
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