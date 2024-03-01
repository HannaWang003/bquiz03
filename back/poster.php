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
<div class="ct">預告片清單</div>
<table>
    <tr>
        <th>預告片海報</th>
        <th>預告片片名</th>
        <th>預告片排序</th>
        <th>操作</th>
    </tr>
    <?php
$rows=$Poster->all();
foreach($rows as $row){
    ?>
    <tr>
        <td><img src="./img/<?=$row['img']?>"></td>
        <td><?=$row['name']?></td>
        <td><?=$row['rank']?></td>
        <td>
            <input type="checkbox" name='sh[]' value="<?=$row['id']?>" <?=($row['sh']==1)?"checked":""?>>
            <input type="checkbox" name='del[]' value="<?=$row['id']?>">
        </td>
    </tr>

    <?php
}
?>
</table>
<?php