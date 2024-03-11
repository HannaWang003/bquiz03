<?php
$total = $Movie->count(['sh'=>1]);
$div=4;
$now=($_GET['p'])??1;
$pages=ceil($total/$div);
$start=($now-1)*$div;
$movies = $Movie->all(['sh'=>1],"order by rank limit $start,$div");
$posters = $Poster->all(['sh'=>1],"order by rank");
?>
<style>
  .lists{
    overflow:hidden;
    height:300px;
    /* background:red; */
  }
  .list{
    width:250px;
    margin:auto;
    display:none;
  }
  .list img{
    width:100%;
  }
  .controls{
    display:flex;
    align-items:center;
  }
  .btns{
    overflow:hidden;
    height:100px;
    width:360px;
    margin:auto;
    display:flex;
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
a{
  text-decoration: none;
}
</style>
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
         <div class="lists">
          <?php
foreach($posters as $idx=>$poster){
  ?>
<div class="list" data-ani="<?=$poster['ani']?>">
  <img src="./img/<?=$poster['poster']?>" alt="">
  <div class="ct"><?=$poster['name']?></div>
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
  <img src="./img/<?=$poster['poster']?>" alt="">
  <div class="ct"><?=$poster['name']?></div>
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
      let timer=setInterval(slide,2000);
      let now=0;
      let next=0;
      let p=0;
      let total=$('.list').length;
      function slide(n){
        let ani = $('.list').eq(now).data('ani');
        if(typeof(n)=="undefined"){
          next=now+1;
if(next>total-1){
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
      $('.left,.right').on('click',function(){
        let arrow = $(this).attr('class');
        switch(arrow){
          case "left":
            if(p-1>=0){
              p--;
            }
            break;
          case "right":
            if(p+1<=(total-4)){
              p++;
            }
            break;
        }
        $('.btn').animate({right:90*p});
      })
      $('.btns').hover(function(){
        clearInterval(timer);
      },function(){
        timer=setInterval(slide,2000)
      })
      $('.btn').on('click',function(){
        let idx=$(this).index();
        console.log(idx);
        slide(idx);
      })
    </script>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:100%;">
       <div style="display:flex;flex-wrap:wrap;justify-content:space-between;height:380px;">
       <?php
foreach($movies as $movie){
       ?>
       <div style="width:48%;height:180px;border:1px solid #000;">
      <div class="ct">
        <button onclick="location.href='?do=intro&id=<?=$movie['id']?>'">劇情介紹</button>
        <button onclick="location.href='?do=order&id=<?=$movie['id']?>'">線上訂票</button>
      </div>
      </div>
<?php
}
?>
       </div>
        <div class="ct">
          <?php
for($i=1;$i<=$pages;$i++){
  echo "<a href='?do=main&p=$i' style='font-size:20px;color:#eee'>$i</a>";
}
          ?>
        </div>
      </div>
    </div>