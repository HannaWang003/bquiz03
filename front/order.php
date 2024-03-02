<?php
?>
    <table id="select">
    <tr>
        <td>電影:</td>
        <td><select name="movie" id="movie">
            <!-- ajax -->
        </select></td>
    </tr>
    <tr>
        <td>日期:</td>
        <td><select name="date" id="date">
            <!-- ajax -->
        </select></td>
    </tr>
    <tr>
        <td>場次:</td>
        <td><select name="sess" id="sess">
            <!-- ajax -->
        </select></td>
    </tr>
    <tr>
        <td colspan='2' class='ct'>
            <button onclick="$('#select').hide();$('#book').show()" id="bookBtn">確定</button>&nbsp;&nbsp;<input type="reset" value='重置'>
        </td>
        <!-- <td></td> -->
    </tr>
</table>
    <script>
        
        getmovie(<?=($_GET['id'])??0?>);
        $('#movie').on('change',function(){
            getdate($('#movie').val());
        })
        $('#date').on('change',function(){
            getsess($('#movie').val(),$('#date').val())
        })
        function getmovie(id){
            $.post('./api/getmovie.php',{id},function(res){
                $('#movie').html(res);
                let movieid=$('#movie').val();
                getdate(movieid);
            })
        }
        function getdate(id){
$.post('./api/getdate.php',{id},function(res){
    $('#date').html(res);
    let movie=$('#movie').val();
    let date=$('#date').val();
    getsess(movie,date);
})
        }
        function getsess(movie,date){
            $.post('./api/getsess.php',{movie,date},function(res){
                $('#sess').html(res);
            })

        }
    </script>
    <div id="book" style="display:none;">

    </div>
    <script>
$('#bookBtn').on('click',function(){
    let movie = $('#movie').val();
    let date=$('#date').val();
    let sess=$('#sess').val();
    $.post('./front/book.php',{movie,date,sess},function(res){
        $('#book').html(res)
    })
})
    </script>