<style>
img {
    width: 100px;
}

table {
    width: 80%;
    margin: auto;
}

td {
    text-align: center;
}
</style>
<div class="ct wx" style="padding:20px 40px;">預告片清單</div>
<table>
    <tr>
        <th>預告片海報</th>
        <th>預告片片名</th>
        <th>預告片排序</th>
        <th>操作</th>
    </tr>
    <?php
$rows=$Poster->all("order by `rank`");
foreach($rows as $key=> $row){
    $up=($key==0)?0:$key-1;
    $down=($key!=(count($rows)-1))?$key+1:$key;
    ?>
    <tr>
        <td><img src="./img/<?=$row['img']?>"></td>
        <td><?=$row['name']?></td>
        <td>
        <button onclick="sw(<?=$row['id']?>,<?=$rows[$up]['id']?>)">往上</button>    
        <button onclick="sw(<?=$row['id']?>,<?=$rows[$down]['id']?>)">往下</button>    
        </td>
        <td>
            <input type="checkbox" name='sh[]' value="<?=$row['id']?>" <?=($row['sh']==1)?"checked":""?>>
            <input type="checkbox" name='del[]' value="<?=$row['id']?>">
        </td>
    </tr>

    <?php
}
?>
</table>
<div class="ct wx" style="padding:20px 40px;">新增預告片海報</div>
<form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>預告片海報:</td>
            <td><input type="file" name="img"></td>
            <td>預告片片名:</td>
            <td><input type="text" name="name"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
<script>
    function sw(now,sw){
        $.post('./api/sw.php',{now,sw},function(res){
            location.reload();
            // console.log(res);
        })
    }
</script>