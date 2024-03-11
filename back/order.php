<div class="ct">訂單清單</div>

<div style="display:flex;">
    快速刪除
    <input type="radio" name="type" value="1">依日期<input type="text" name="date" id="date">
    <input type="radio" name="type" value="2">依電影<select name="text" id="text">
<?php
$rows = $Order->all(" group by `text`");
foreach($rows as $row){
    echo "<option value='{$row['text']}'>{$row['text']}</option>";
}
?>
    </select>
    <button onclick="delall()">刪除</button>
</div>
<table width="100%">
    <tr>
        <th>訂單編號</th>
        <th>電影名稱</th>
        <th>日期</th>
        <th>場次時間</th>
        <th>訂購數量</th>
        <th>訂購位置</th>
        <td>操作</td>
    </tr>
    <?php
$rows=$Order->all();
foreach($rows as $row){
    $tmp=unserialize($row['seats']);
    $seat="";
    foreach($tmp as $s){
        $col=ceil($s/5);
        $num=($s-1)%5+1;
        $seat.="<div> $col 排 $num 號</div>";
    }
    ?>
    <tr>
        <th><?=$row['no']?></th>
        <th><?=$row['text']?></th>
        <th><?=$row['date']?></th>
        <th><?=$row['session']?></th>
        <th><?=$row['qt']?></th>
        <th><?=$seat?></th>
        <td><button onclick="del(<?=$row['id']?>)">刪除</button></td>
    </tr>

<?php
}

?>
</table>
<script>
    function del(id){
        $.get('./api/del.php',{do:'order',id},function(){
            location.reload();
        })
    }
</script>