<style>
.lists{
  width:430px;
  height:300px;
  overflow:hidden;
  position:relative;
}
.list{
  width:250px;
  display:none;
  margin:auto;
}
.list img{
  width:100%;
}
.btns{
  display:flex;
  overflow:hidden;
  width:360px;
  height:100px;
  margin:auto;
  position:relative;
}
.btn{
  width:90px;
  height:100px;
  text-align:center;
  flex-shrink:0;
  position:relative;
}
.btn img{
  width:60px;
}
.right,.left{
  width:0;
  border:20px solid #000;
  border-top-color: transparent;
  border-bottom-color: transparent;
}
.right{
  border-right-width: 0;
}
.left{
  border-left-width: 0;
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
<div class="lists">
  <?php
$posters = $Poster->all(['sh'=>1],"order by rank");
foreach($posters as $idx=>$poster){
  ?>
  <div class="list" data-ani="<?=$poster['ani']?>" >
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
  let total = $('.btn').length;
let now=0;
let next=0;
let timer=setInterval(slider,3000);
function slider(n){
  let ani=$('.list').eq(now).data('ani');
  if(typeof(n)=="undefined"){
    next=now+1;
    if(next>=total){
      next=0
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
        p++
      }
      break;
  }
  $('.btn').animate({right:90*p});
})
$('.btns').hover(function(){
  clearInterval(timer)
},
function(){
  timer = setInterval(slider,3000)
})
$('.btn').on('click',function(){
  let idx = $(this).index();
  setInterval(slider(idx),3000)
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