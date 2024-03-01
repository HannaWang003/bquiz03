<style>
    table{
        width:80%;
        margin:auto;
    }
    .title{
        display:inline-block;
        width:30%;
        margin:10px 0;
    }
    td:nth-child(1){
        vertical-align:top;
    }
</style>
<form action="./api/add_movie.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>影片資料</td>
            <td>
<div><span class='title'>片名:</span> <input type="text" name="name"style="width:65%"></div>
<div><span class='title'>分級:</span> 
<select name="level">
    <option value="1">普遍級</option>
    <option value="2">輔導級</option>
    <option value="3">保護級</option>
    <option value="4">限制級</option>
</select>
<span>(普遍級、保護級、輔導級、限制級)</span>
</div>
<div><span class='title'>片長:</span> <input type="text" name="length" style="width:65%"></div>
<div><span class='title'>上映日期:</span> <input type="date" name="ondate"></div>
<div><span class='title'>發行商:</span> <input type="text" name="publish" style="width:65%"></div>
<div><span class='title'>導演:</span> <input type="text" name="director" style="width:65%"></div>
<div><span class='title'>預告影片:</span> <input type="file" name="trailer" style="width:65%"></div>
<div><span class='title'>電影海報:</span> <input type="file" name="poster" style="width:65%"></div>
            </td>
        </tr>
        <tr>
            <td>劇情簡介</td>
            <td>
                <textarea name="intro" style="width:100%;height:100px;"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="submit" value="重置">
    </div>
</form>