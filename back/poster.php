<?php
$do=$_GET['do'];
$DB=${ucfirst($do)};
?>
<style>
    td,th{
        text-align:center;
    }
    th{
        background:#aaa;
    }
    td{
        padding:5px;
        border-bottom:2px solid #eee;
    }
    table,tr,td{
        border-collapse:collapse;
    }
</style>
<div class="ct" style="background:#333;"><h2 style="margin:0">預告片清單</h2></div>
<form action="./api/edit.php?do=<?=$do?>" method="post">
<div style="height:250px;overflow:auto;border:1px solid #eee;">
<table width="100%;" style="background:#ccc;color:black;margin-bottom:10px;overflow:auto">
    <tr>
        <th>預告片海報</th>
        <th>預告片片名</th>
        <th>預告片排序</th>
        <th>操作</th>
    </tr>
    <?php
$rows = $DB->all("order by rank");
$num = $DB->count()-1;
foreach($rows as $idx => $row){
   $up=($idx==0)?0:$idx-1;
   $dn=($idx==$num)?$num:$idx+1;
    ?>
    <tr>
        <td><img src="./img/<?=$row['img']?>" style="width:100px"></td>
        <td><input type="text" name="text[]" value="<?=$row['text']?>"></td>
        <td>
            <input class="rankbtn" type="button" value="往上" data-now="<?=$row['id']?>" data-ch="<?=$rows[$up]['id']?>">
            <input class="rankbtn" type="button" value="往下" data-now="<?=$row['id']?>" data-ch="<?=$rows[$dn]['id']?>">
        </td>
        <td>
            <input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=($row['sh']==1)?"checked":"";?> >顯示
            <input type="checkbox" name="del[]" value="<?=$row['id']?>">刪除
        </td>
    </tr>
    <input type="hidden" name="id[]" value="<?=$row['id']?>">
    <?php
}
?>
</table>
</div>
<div class="ct">
    <input type="submit" value="編輯確定">&nbsp;&nbsp;<input type="reset" value="重置">
</div>
</form>
<div class="ct" style="background:#333;"><h2 style="margin:10px 0 0 0">新增預告片海報</h2></div>
<form action="./api/add.php?do=<?=$do?>" method="post" enctype="multipart/form-data">
<table width="100%" style="background:#ccc;color:black;margin-bottom:10px;">
    <tr>
        <td>預告片海報: <input type="file" name="img"></td>
        <td>預告片片名: <input type="text" name="text"></td>
    </tr>
</table>
<div class="ct">
    <input type="submit" value="新增">&nbsp;&nbsp<input type="reset" value="重置">
</div>
</form>
<script>
    $('.rankbtn').on('click',function(){
        let id=$(this).data('now');
        let ch = $(this).data('ch');
        let db='poster';
        $.post('./api/rank.php',{id,ch,db},function(res){
            location.reload();
            // console.log(res);
        })
    })
</script>