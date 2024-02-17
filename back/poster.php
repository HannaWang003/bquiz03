<style>
    img{
        width:100px;
    }
    h3{
        background:#333;
    }

    table,tr,th,td{
        border-collapse:collapse;
    }
    td{
        border-bottom:1px solid #333;
    }
    td,th{
        padding:5px 0;
    }
    thead tr{
        background:#999;
    }

</style>

    <h3 class="ct">預告片清單</h3>
    <div style='height:200px;overflow-x:hidden;overflow-y:auto;'>
    <form id="editPoster">
<table class="ts">
    <thead>
    <tr>
        <th>預告片海報</th>
        <th>預告片片名</th>
        <th>預告片排序</th>
        <th>操作</th>
        </tr>
        </thead>
       
        <tbody id="posterAry">
<!-- ajax -->
        </tbody>
    </table>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
</div>
</form>
</div>
<hr>
<div>
    <h3 class="ct">新增預告片海報</h3>
    <form id="addPoster">
        <table class="ts">
            <tr>
                <td class="ct">預告片海報:</td>
                <td class="ct"><input type="file" name="img"></td>
                <td class="ct">預告片片名:</td>
                <td class="ct"><input type="text" name="name"></td>
            </tr>
        </table>
        <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
    </form>
</div>
<script>
    posterAry();
function posterAry(){
    $.ajax({
        type:'get',
        data:{
            table:"Poster",
        },
        dataType:'json',
        url:'./api/getAll.php',
        success:function(res){
            let posterContent=$('#posterAry');
            let html ='';
        $.each(res,function(key,val){
            html += `
            <tr>
            <td class='ct'>
            <img src="./img/${val.img}">
            </td>
            <td class='ct'><input type="text" name="name[]" value=${val.name}></td>
        <td class='ct'>
            <input class='btn' type='button' data-id='${val.id}' data-sw='${(key!==0)?res[key-1]['id']:val.id}' value='往上'><br>
            <input class='btn' type='button' data-id='${val.id}' data-sw='${((res.length-1)!=key)?res[key+1]['id']:val.id}' value='往下'>
        </td>
        <td class='ct'>
        <select name="ani[]">
    <option value="1" ${(val.ani==1)?"selected":""}>淡入淡出</option>
    <option value="2" ${(val.ani==2)?"selected":""}>縮放</option>
    <option value="3" ${(val.ani==3)?"selected":""}>滑入滑出</option>
</select>
            <input type="checkbox" name="sh[]" value='${val.id}' ${(val.sh==1)?"checked":""}>顯示
            <input type="checkbox" name="del[]" value='${val.id}'>刪除
            <input type="hidden" name="id[]" value='${val.id}'>
        </td>
        </tr>
            `
        })
        posterContent.html(html);
        }
    })
}
  $('#addPoster').submit(function(event){
    event.preventDefault();
    let addData = new FormData(this);
    $.ajax({
        type:"post",
        data:addData,
        contentType:false,
        processData:false,
        url:"./api/add_poster.php",
        success:function(res){
console.log(res);
if($.isNumeric(res)){
alert('新增'+res+'筆資料')
}else{
    alert(res);
}
posterAry();
        }
    })
})
$('#editPoster').submit(function(event){
    event.preventDefault();
    let editData = new FormData(this);
    $.ajax({
        type:"post",
        data:editData,
        dataType:'json',
        contentType:false,
        processData:false,
        url:"./api/edit_poster.php",
        success:function(res){
            // console.log(res);
            posterAry();
        }

    })
})
$('#posterAry').on('click','.btn',function(){
    let id = $(this).data('id');
    let sw = $(this).data('sw');
    $.ajax({
        type:'post',
        // dataType:'json',
        data:{
            'table':'Poster',
            id,
            sw
        },
        url:'./api/sw.php',
        success:function(res){
            // console.log(res)
            posterAry();
        },
        error:function(){
            console.log('error')
        }
    })
})
</script>