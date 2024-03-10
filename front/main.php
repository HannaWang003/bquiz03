<style>
  .lists{
    text-align:center;
    position:relative;
    height:300px;
    overflow:hidden;
  }
  .list{
    display:none;
    width:200px;
    margin:auto;
    display:none;
  }
  .list *{
   box-sizing:border-box;
  }
  .list img{
    width:100%;
  }
  .controls{
    width:420px;
    height:100px;
    display:flex;
    align-items:center;
    position:relative;
  }
  .btns{
    width:360px;
    height:100px;
    display:flex;
    overflow:hidden;
    margin:auto;
  }
  .btn{
    width:90px;
    text-align:center;
    font-size:12px;
    flex-shrink:0;
    position:relative;
  }
  .btn img{
    width:60px;
    height:80px;
  }
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
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <div class="lists">
<?php
$posters = $Poster->all(['sh'=>1],"order by rank");
foreach($posters as $idx=> $poster){
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
  let total=$(".btn").length;
  //輪播
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
      $('.list').eq(now).fadeOut(1500,function(){
        $('.list').eq(next).fadeIn(1500)
      })
      break;
      case 2:
        $('.list').eq(now).hide(1500,function(){
          $('.list').eq(next).show(1500)
        })
        break;
      case 3:
        $('.list').eq(now).slideUp(1500,function(){
          $('.list').eq(next).slideDown(1500)
        })
        break;
  }
  now=next;
}





  //按鈕
  let p=0;
  $(".left,.right").on('click',function(){
    let arrow = $(this).attr('class');
    switch(arrow){
      case "right":
        if(p+1<=(total-4)){
          p++;
        }
        break;
        case "left":
          if(p-1>=0){
            p--;
          }
          break;
    }
    $('.btn').animate({right:90*p});
    $('.btn').on('click',function(){
      let idx=$(this).index();
      slide(idx);
    })
    $('.btns').hover(function(){
      clearInterval(timer);
    },function(){
      timer=setInterval(slide,3000)
    })
  })
</script>

    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <table>
          <tbody>
            <tr> </tr>
          </tbody>
        </table>
        <div class="ct"> </div>
      </div>
    </div>