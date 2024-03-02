<?php
$row = $Order->find(['no'=>$_GET['no']]);
?>
<style>
    table{
        margin:20px auto;
        width:80%;
        border-collapse:collapse;
    }
    td{
        padding:5px 10px;
        border:1px solid #000;
    }
    td:nth-child(1){
        background:#eee;
    }
</style>
<div class="ct">感謝您的訂購，您的訂單編號是:<?=$_GET['no']?></div>
<table>
    <tr>
        <td>電影名稱: </td>
        <td><?=$row['movie']?></td>
    </tr>
    <tr>
        <td>日期: </td>
        <td><?=$row['date']?></td>
    </tr>
    <tr>
        <td>場次時間: </td>
        <td><?=$row['session']?></td>
    </tr>
    <tr>
        <td colspan=2>
            <div>座位:</div>
            <?php
$seats=unserialize($row['seats']);
foreach($seats as $seat){
    echo "<div>";
echo (ceil($seat/5))."排 ".(($seat-1)%5+1)."號";
    echo "</div>";
}
?>
<div>共<?=$row['qt']?>張票</div>
        </td>
        <!-- <td></td> -->
    </tr>
</table>
<div class="ct"><button onclick="location.href='index.php'">確認</button></div>
