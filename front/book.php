<?php
include_once "../api/db.php";
$row=$Movie->find($_POST['movie'])['name'];
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
    }
</style>
<div id="room"></div>
<div>
    <div id="movie">您選擇的電影是: <span class="red"><?=$row?></span></div>
    <div>您選擇的時刻是:<span id="date" class='red'><?=$_POST['date']?></span>&nbsp;&nbsp;<span id="sess" class='red'><?=$_POST['sess']?></span></div>
    <div>你已勾選了<span id="num" class='red'></span>張票，最多可以購買<span  class='red'>四</span>張票</div>
</div>