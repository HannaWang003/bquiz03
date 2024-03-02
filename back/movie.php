
<style>
    img{
        width:100px;
    }
    td{
        padding:10px 20px;
    }
    table{
        width:100%;
    }
</style>
<div><input type="button" value="新增電影" onclick="location.href='?do=add_movie'"></div>
<table>
<?php
$rows=$Movie->all('order by `rank`');
foreach($rows as $row){
?>
    <tr>
        <td><img src="./img/<?=$row['poster']?>" alt=""></td>
        <td>分級:<img src="./icon/03C0<?=$row['level']?>.png" style="width:30px;"/>
        </td>
        <td>
            <div class="row">
                <div>片名:<?=$row['name']?></div>
                <div>片長:<?=$row['length']?></div>
                <div>上映時間:<?=$row['ondate']?></div>
            </div>
            <div class="row">
                <button onclick="edit(<?=$row['id']?>)" >編輯電影</button>&nbsp;&nbsp;
                <button onclick="del(this,<?=$row['id']?>)" >刪除電影</button>
            </div>
            <div class="row">
            <?=$row['intro']?>
            </div>
        </td>
    </tr>
    <?php
}
    ?>
</table>
<script>
    function edit(id){
        $.post('./back/edit_movie.php',{id},function(res){

            $('#mmsub').html(res)
        })
    }
    function del(elm,id){
        let now=$(elm);
        $.post('./api/del.php',{table:'Movie',id},function(res){
            console.log(now.closest('tr'))
            now.closest('tr').remove();
})
    }
</script>