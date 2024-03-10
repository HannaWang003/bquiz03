<style>
  *{
    box-sizing:border-box;
  }
  .lists{
    width:430px;
    height:300px;
    overflow:hidden;
    position:relative
  }
  .list{
    width:250px;
    margin:auto;
    display:none;
    position:relative;
  }
  .list img{
    width:100%;
  }
  .btns{
    width:360px;
    height:100px;
    display:flex;
    overflow:hidden;
    margin:auto;
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
  .left,.right{
    width:0;
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
  .controls{
    display:flex;
    align-items:center;
  }
</style>
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <?php
$posters = $Poster->all(['sh'=>1],"order by rank");
          ?>
<div class="lists">
  <?php
  foreach($posters as $idx=>$poster){
    ?>
  <div class="list" data-ani="<?=$poster['ani']?>">
    <img src="./img/<?=$poster['img']?>" alt="">
    <div class="ct"><?=$poster['text']?></div>
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
    <img src="./img/<?=$poster['img']?>" alt="">
    <div class="ct"><?=$poster['text']?></div>
  </div>
  <?php
}
?>
            </div>
            <div class="right"></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('.list').eq(0).show();
      let p=0;
      let total=$('.btn').length;
      let now=0;
      let next=0;
      let timer = setInterval(slide,3000);
      function slide(n){
        if(typeof(n)=="undefined"){
          next=now+1;
          if(next>=total){
            next=0
          }
        }else{
          next=n;
        }
        let ani = $('.list').eq(now).data('ani');
        switch(ani){
          case 1:
            $('.list').eq(now).fadeOut(1000,function(){
              $('.list').eq(next).fadeIn(1000);
            });
            break;
          case 2:
            $('.list').eq(now).hide(1000,function(){
              $('.list').eq(next).show(1000);
            });
            break;
          case 3:
            $('.list').eq(now).slideUp(1000,function(){
              $('.list').eq(next).slideDown(1000);
            });
            break;
        }
        now=next;
      }
      $('.left,.right').on('click',function(){
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
              break;
        }
        $('.btn').animate({right:90*p});
      })
      $('.btns').hover(function(){
        clearInterval(timer)},
        function(){
timer=setInterval(slide,3000)
        } 
      )
      $('.btn').on('click',function(){
        let idx = $(this).index();
        slide(idx);
      })
    </script>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:100%;">
<div style="display:flex;flex-wrap:wrap;justify-content:space-evenly;height:380px;">
<?php
$today=date("Y-m-d");
$lastondate=date("Y-m-d",strtotime("-2 days"));
$total=$Movie->count(" where `ondate` between '{$lastondate}' and '{$today}' AND `sh`='1'");
$div=4;
$pages=ceil($total/$div);
$now=($_GET['p'])??"1";
$start=($now-1)*$div;
$movies = $Movie->all(" where `ondate` between '{$lastondate}' and '{$today}' AND `sh`='1' order by rank limit $start,$div");
// dd($movies);
foreach($movies as $movie){
  switch($movie['level']){
    case 1:
      $lv="普遍級";
      break;
    case 2:
      $lv="保護級";
      break;
    case 3:
      $lv="輔導級";
      break;
    case 4:
      $lv="限制級";
      break;
  }
?>
  <div style="width:49%;height:180px;border:1px solid #000;padding:5px;">
  <div style="display:flex;">
    <div><img src="./img/<?=$movie['poster']?>" style="width:90px;height:120px;object-fit:cover;"></div>
    <div style="font-size:14px;">
      <h3><?=$movie['text']?></h3>
      <div>分級: <img src="./icon/03C0<?=$movie['level']?>.png" alt=""><?=$lv?></div>
      <div>上映日期: <?=$movie['ondate']?></div>
    </div>
  </div>
  <div class="ct">
    <input type="button" value="劇情簡介" style="font-size:14px;"><input type="button" value="線上訂票" style="font-size:14px;">
  </div>
</div>
  <?php
  }
  ?>
</div>
        <div class="ct">
          <?php
for($i=1;$i<=$pages;$i++){
  echo "<a href='?p=$i'>$i</a>";
}
          ?>
        </div>
      </div>
    </div>