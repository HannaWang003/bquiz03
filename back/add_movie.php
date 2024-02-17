<h3 class="ct">新增院線片</h3>
<form id="addMovie">
    <div style="display:flex;align-items:start;width:80%;margin:auto">
        <div style="width:20%">影片資料</div>
        <div style="width:80%">
        <table style="width:100%;">
            <tr>
                <td>片名</td>
                <td><input style="width:80%" type="text" name="name" id=""></td>
            </tr>
            <tr>
                <td>分級</td>
                <td>
                    <select name="level" id="">
                        <option value="1">普遍級</option>
                        <option value="2">輔導級</option>
                        <option value="3">保護級</option>
                        <option value="4">限制級</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>片長</td>
                <td><input style="width:80%" type="text" name="length" id=""></td>
            </tr>
            <tr>
                <td>上映日期</td>
                <td>
                    <select name="year" id="">
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>年
                    <select name="month" id="">
                        <?php
for($i=1;$i<=12;$i++){
    echo "<option value='$i'>$i</option>";
}
                        ?>
                    </select>月
                    <select name="date" id="">
                    <?php
for($i=1;$i<=31;$i++){
    echo "<option value='$i'>$i</option>";
}
                        ?>
                    </select>日
                </td>
            </tr>
            <tr>
                <td>發行商</td>
                <td><input style="width:80%" type="text" name="publish" id=""></td>
            </tr>
            <tr>
                <td>導演</td>
                <td><input style="width:80%" type="text" name="director" id=""></td>
            </tr>
            <tr>
                <td>預告影片</td>
                <td><input type="file" name="trailer" id=""></td>
            </tr>
            <tr>
                <td>電影海報</td>
                <td><input type="file" name="poster" id=""></td>
            </tr>
        </table>
        </div>
    </div>
    <div style="display:flex;align-items:start;width:80%;margin:auto">
        <div style="width:20%">劇情簡介</div>
        <div style="width:80%"><textarea name="intro" style="width:100%;height:100px"></textarea></div>
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
<script>
    $('#addMovie').submit(function(event){
event.preventDefault();
let addData = new FormData(this)
$.ajax({
    type:'post',
    data:addData,
    url:'./api/add_movie.php',
    dataType:'json',
    contentType:false,
    processData:false,
    success:function(res){
        // console.log(res);
    },
    complete:function(){
        $('.tab').load('./back/movie.php');

    }
})
    })
</script>
