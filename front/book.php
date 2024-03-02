<?php
include_once "../api/db.php";
$movie=$Movie->find($_POST['movie'])['name'];
$date=$_POST['date'];
$sess=$_POST['sess'];
?>
<style>
    .red{
        color:red;
    }
    #room{
        background-image:url('../icon/03D04.png');
        background-position:center;
        background-repeat:none;
        width:540px;
        height:370px;
        margin:auto;
        box-sizing:border-box;
        padding:19px 112px 0 112px;
    }
    .seats{
        display:flex;
        flex-wrap:wrap;
    }
    .seat{
        width:63px;
        height:85px;
        /* background:#eee; */
        position:relative;
    }
    .chk{
        position:absolute;
        right:2px;
        bottom:2px;
    }
</style>
<div id="room">
    <div class="seats">
        <?php
for($i=1;$i<=20;$i++){
    echo "<div class='seat'>";
    echo "<div class='ct'>";
    echo (ceil($i/5))."排";
    echo (($i-1)%5+1)."號";
    echo "</div>";
    echo "<div class='ct'>";
    echo "<img src='./icon/03D02.png'>";
    echo "</div>";
    echo "<input type='checkbox' name='chk' value='$i' class='chk'>";
    echo "</div>";
}
        ?>
        
    </div>
</div>
<div>
    <div id="movie">您選擇的電影是: <span class="red"><?=$movie?></span></div>
    <div>您選擇的時刻是:<span id="date" class='red'><?=$date?></span>&nbsp;&nbsp;<span id="sess" class='red'><?=$sess?></span></div>
    <div>你已勾選了<span id="num" class='red'></span>張票，最多可以購買<span  class='red'>四</span>張票</div>
</div>
<div>
    <button onclick="$('#select').show();$('#book').hide()">上一步</button>
    <button onclick="checkout()">訂購</button>
</div>
<script>
    let seats=new Array();
    $('.chk').on("change",function(){
        if($(this).prop('checked')){
            if(seats.length+1<=4){
                seats.push($(this).val())
            }else{
                $(this).prop('checked',false);
                alert("每個人只能勾選四張票")
            }
            
        }else{
            seats.splice(seats.indexOf($(this).val()),1)
        }
        console.log(seats.length)
        $('#num').text(seats.length);
    })
    function checkout(){
        $.post("../api/checkout.php",{
            movie:'<?=$movie?>',
            date:'<?=$date?>',
            session:'<?=$sess?>',
            seats},
            (no)=>{
                // console.log(no);
                location.href=`?do=result&no=${no}`;
            })
    }
</script>