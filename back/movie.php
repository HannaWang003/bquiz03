<input type="button" value="新增電影" class="btn">
<style>
    .d-flex{
        display:flex;
    }
    .text-center{
        text-align:center;
    }
    .text-end{
        text-align:end;
    }
    .justify-content-between{
        justify-content:space-between;
    }
    .justify-content-center{
        justify-content:center;
    }
    .align-items-center{
        align-items:center;
    }
    .w-80{
        width:80%;
    }
    .w-20{
        width:20%;
    }
</style>
<div class="container">
    <!-- movie list -->
</div>
<hr>
<script>
    movieAry('Movie');
    $('.btn').on('click',function(){
        $.ajax({
            type:'get',
            url:'./back/add_movie.php',
            success:function(res){
                $('.tab').load('./back/add_movie.php');
            }
        })
    })
    function show(el,id){
// console.log($(el))

$.ajax({
    type:'post',
    url:'./api/show.php',
    data:{
        'table':'Movie',
        id
    },
    success:function(res){
        if(res==1){
            $(el).text('顯示')
        }else{
            $(el).text('隱藏')
        }

    },
    error:function(){
        console.log('error')
    }

})
    }
    function del(el,id){
        // console.log(el)
        $.ajax({
            type:'post',
            url:'./api/del.php',
            data:{
                'table':'Movie',
                id,
            },
            success:function(res){
                $(el).closest('.movielist').remove();
                console.log("已刪除"+res+"筆資料")
            }
        })
    }
    function movieAry(table){
        $.ajax({
            type:'get',
            url:'./api/getAll.php',
            data:{
                table
            },
            dataType:'json',
            success:function(movies){
                // console.log(movies);
            let html='';
            $.each(movies,function(key,movie){
                html+=`
                <div class='d-flex movielist'>
        <div class='w-20'>
        <img src="./img/${movie.poster}" style='object-fix:cover;width:150px;'>
        </div>
        <div class='w-20 d-flex align-items-center justify-content-center'>分級:<img src="./icon/03C0${movie.level}.png"></div>
        <div class='w-80'>
            <div class='d-flex justify-content-between'>
                <div>片名:${movie.name}</div>
                <div>片長:${movie.length}</div>
                <div>上架時間:${movie.ondate}</div>
            </div>
            <div class='text-end'>
<button onclick='show(this,${movie.id})'>${(movie.sh==1)?'顯示':'隱藏'}</button>
<button 
data-id='${movie.id}'
data-sw='${(key!=0)?movies[key-1]['id']:movie.id}'
class='btn-sw'>往上</button>
<button
data-id='${movie.id}'
data-sw='${(key!=(movies.length-1))?movies[key+1]['id']:movie.id}'
class='btn-sw'>往下</button>
<button>編輯電影</button>
<button onclick='del(this,${movie.id})'>刪除電影</button>
            </div>
            <div>劇情介紹:${movie.intro}</div>
        </div>
    </div>
                `                
            })
            $('.container').html(html)
            }
        })

    }
    $('.container').on('click','.btn-sw',function(){
        let id=$(this).data('id');
        let sw = $(this).data('sw');
        let table = 'Movie';
        $.ajax({
            type:'post',
            data:{
                id,
                sw,
                table
            },
            url:"./api/sw.php",
            success:function(){
                console.log('success')
                movieAry('Movie');
            },
            error:function(){
                console.log('error')
            }
        })
    })
</script>