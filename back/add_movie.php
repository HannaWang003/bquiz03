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
        text-align: justify;
    }
</style>
<div style="height:450px;overflow:auto;">
<form action="./api/add.php?do=movie" method="post" enctype="mutipart/form-data">
<table width="90%">
    <tr>
        <td>影片資料</td>
        <td>
<div><span class="w-20">片名: </span><input type="text" name="text"></div>
<div><span class="w-20">分級: </span>
<select name="level">
    <option value="0">請選擇分級</option>
    <option value="1">普遍級</option>
    <option value="2">保護級</option>
    <option value="3">輔導級</option>
    <option value="4">限制級</option>
</select>
(普遍級、保護級、輔導級、限制級)
</div>
<div><span class="w-20">片長: </span><input type="text" name="length"></div>
<div><span class="w-20">上映日期: </span><input type="date" name="ondate"></div>
<div><span class="w-20">發行商: </span><input type="text" name="publish"></div>
<div><span class="w-20">導演: </span><input type="text" name="director"></div>
<div><span class="w-20">預告片影片: </span><input type="file" name="movie"></div>
<div><span class="w-20">電影海報: </span><input type="file" name="poster"></div>
        </td>
    </tr>
    <tr>
        <td>劇情簡介</td>
        <td>
            <textarea name="intro"></textarea>
        </td>
    </tr>
</table>
<div class="ct">
    <input type="submit" value="新增"><input type="reset" value="重置">
</div>
</form>
</div>