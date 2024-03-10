<style>
    td{
        vertical-align:top;
        padding:10px;
    }
    input{
        margin:5px;
    }
    input[type='text']{
        background:#fff;
        width:65%;
        color:#333;
    }
    textarea{
        width:100%;
        height:150px;
        overflow:auto;
    }
    table{
        margin:auto;
        background:#aaa;
        color:#333;
    }
    .w-20{
        display:inline-block;
        width:20%;
        text-align-last:justify;
    }
</style>
<?php
$do='movie';
$DB=${ucfirst($do)};
$id=$_GET['id'];
$row = $DB->find($id);
?>
<div style="height:450px;overflow:auto;">
<form action="./api/edit.php?do=movie" method="post" enctype="multipart/form-data">
<table width="90%">
    <tr>
        <td>影片資料</td>
        <td>
<div><span class="w-20">片名: </span><input type="text" name="text" value="<?=$row['text']?>"></div>
<div><span class="w-20">分級: </span>
<select name="level">
    <option value="0">請選擇分級</option>
    <option value="1" <?=($row['level']==1)?"selected":""?> >普遍級</option>
    <option value="2" <?=($row['level']==2)?"selected":""?> >保護級</option>
    <option value="3" <?=($row['level']==3)?"selected":""?> >輔導級</option>
    <option value="4" <?=($row['level']==4)?"selected":""?> >限制級</option>
</select>
(普遍級、保護級、輔導級、限制級)
</div>
<div><span class="w-20">片長: </span><input type="text" name="length" value="<?=$row['length']?>"></div>
<div><span class="w-20">上映日期: </span><input type="date" name="ondate" value="<?=$row['ondate']?>"></div>
<div><span class="w-20">發行商: </span><input type="text" name="publish" value="<?=$row['publish']?>"></div>
<div><span class="w-20">導演: </span><input type="text" name="director" value="<?=$row['director']?>"></div>
<div><span class="w-20">預告片影片: </span><input type="file" name="movie"></div>
<div><span class="w-20">電影海報: </span><input type="file" name="poster"></div>
        </td>
    </tr>
    <tr>
        <td>劇情簡介</td>
        <td>
            <textarea name="intro"><?=$row['intro']?></textarea>
        </td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <input type="submit" value="更新"><input type="reset" value="重置">
</div>
</form>
</div>