<?php
$movie=$Movie->find($_POST['movie'])['name'];
$date=$_POST['date'];
$session=$_POST['session'];
$tmps = $Order->all(['name'=>$movie,'date'=>$date,'session'=>$session]);
$seatsed=[];
if(!empty($tmps)){
    foreach($tmps as $tmp){
    $seatsed = array_merge($seatsed,unserialize($tmp['seats']));
}
dd($seatsed);
}
// exit();
?>
<style>
    .red{
        color:red;
    }
    #room{
        width:540px;
        height:370px;
        padding:19px 112px 0px 112px;
        margin:auto;
        background:url('../icon/03D04.png');
        background-repeat: no-repeat;
        background-position: center;
        box-sizing:border-box;
    }
.seats{
    display:flex;
    flex-wrap:wrap;
}
.seat{
    width:63px;
    height:85px;
    position:relative;
}
.chk{
    position:absolute;
    bottom:2px;
    right:2px;
}
</style>
<h1 class="ct">座位表</h1>
<div id="room">
    <div class="seats">
        <?php
for($i=1;$i<=20;$i++){
    $col = ceil($i/5);
    $num = ($i-1)%5+1;
    $ed = (in_array($i,$seatsed))?3:2;
    $disabled = ($ed==3)?"disabled":"";
  echo "<div class='seat'>";
  echo "<div>$col 排 $num 號</div>";  
  echo "<img src='../icon/03D0{$ed}.png' alt=''>";   
  echo "<input type='checkbox' name='seats' class='chk' value='$i' $disabled>";  
  echo "</div>";
}
        ?>
        </div>
</div>
<div class="ct">
    <button onclick="history.go(-1)">上一步</button>
    <button onclick="order()">訂購</button>
</div>
<div>
    <div>您選擇的電影名稱是:<span class="red"><?=$movie?></span></div>
    <div>您選擇的場次是:<span class="red"><?=$date?> - <?=$session?> </span></div>
    <div>您已勾選<span class="red" id="num">x</span>票，最多可以購買四張票</div>
</div>
<script>
    let seats = new Array()
$('.chk').on('change',function(){
    if($(this).prop('checked')){
        if(seats.length+1<=4){
            seats.push($(this).val());
        }else{
            alert("每個人最多只能訂購4張票");
            $(this).prop('checked',false);
        }
    }
    else{
        seats.splice($(this).indexOf,1);
    }
    console.log(seats);
    $('#num').text(seats.length);
})
function order(){
    $.post("./api/order.php",{
name:'<?=$movie?>',
date:'<?=$date?>',
session:'<?=$session?>',
qt:seats.length,
seats,
    },(no)=>{
        // console.log(no);
location.href='?do=checkout&no='+no;
    })
}
</script>