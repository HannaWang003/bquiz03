<?php
$do=$_GET['do'];
$DB=${ucfirst($do)};
?>
<style>
    table{
        background:#eee;
        color:black;
    }
    td{
        padding:10px;
        border-bottom:2px solid #333;
    }
</style>
<div><button onclick="location.href='?do=add_movie'">新增電影</button></div>
<div style="overflow:auto;height:420px;">
<table width="100%">
    <?php
$rows = $DB->all("order by rank");
$num = $DB->count()-1;
foreach($rows as $idx=> $row){
    $up=($idx==0)?0:$idx-1;
    $dn=($idx==$num)?$num:$idx+1;
    ?>
<tr>
    <td><img src="./img/<?=$row['poster']?>" style="width:100px;"></td>
    <td style="veritcal-align:center;">分級:<img src="./icon/03C0<?=$row['level']?>.png" style="width:30px;"></td>
    <td>
        <div style="display:flex;justify-content:space-between">
            <div>片名:<?=$row['text']?></div>
            <div>片長:<?=$row['length']?></div>
            <div>上映時間:<?=$row['ondate']?></div>
        </div>
        <div style="text-align:end;">
<button class="rankbtn" data-now="<?=$row['id']?>" data-ch="<?=$rows[$up]['id']?>">往上</button>
<button class="rankbtn" data-now="<?=$row['id']?>" data-ch="<?=$rows[$dn]['id']?>">往下</button>
<button onclick="location.href='?do=edit_movie&id=<?=$row['id']?>'">編輯電影</button>
&nbsp;&nbsp;
<button onclick="location.href='./api/del.php?do=<?=$do?>&id=<?=$row['id']?>'">刪除電影</button>
        </div>
        <div>
        <?=$row['intro']?>
        </div>
    </td>
</tr>
<?php
}
?>
</table>
</div>
<script>
    $('.rankbtn').on('click',function(){
        let id=$(this).data('now');
        let ch = $(this).data('ch');
        let db='movie'
        $.post('./api/rank.php',{id,ch,db},function(res){
            location.reload();
        })
    })
</script>
