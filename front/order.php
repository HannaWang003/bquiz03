<h1 class="ct">線上訂票</h1>
<form action="?do=book" method="post">
<table>
    <tr>
        <td>電影:</td>
        <td>
    <select name="movie" id="movie"></select>
    </td>
    </tr>
    <tr>
        <td>日期</td>
        <td>
            <select name="date" id="date"></select>
        </td>
    </tr>
    <tr>
        <td>場次</td>
        <td>
            <select name="session" id="session"></select>
        </td>
    </tr>
</table>
<div>
    <input type="submit" value="訂票">
    <input type="reset" value="重置">
</div>
</form>
<script>
    getmovie(<?=($_GET['id'])??0?>);
    $('#movie').on('change',function(){
        let id=$(this).val();
        getdate(id);
    })
    $('#date').on('change',function(){
        let movie=$('#movie').val();
        let date=$(this).val();
        getsess(movie,date);
    })
    function getmovie(id){
        $.get('./api/getmovie.php',{id},(res)=>{
            $('#movie').html(res);
            let id=$('#movie').val();
            getdate(id);
        })
    }
    function getdate(id){
        $.get('./api/getdate.php',{id},(res)=>{
            $('#date').html(res);
            let movie=$('#movie').val();
            let date=$('#date').val();
            getsess(movie,date);
        })
    }
    function getsess(movie,date){
        $.get('./api/getsess.php',{movie,date},(res)=>{
            $('#session').html(res);
        })
    }
</script>