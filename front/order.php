<h1 class="ct">線上訂票</h1>
<table>
    <tr>
        <td>電影:</td>
        <td>
            <select name="movie" id="movie"></select>
        </td>
    </tr>
    <tr>
        <td>日期:</td>
        <td>
            <select name="date" id="date"></select>
        </td>
    </tr>
    <tr>
        <td>場次:</td>
        <td>
            <select name="sess" id="sess"></select>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <button id="bookbtn">確定</button>
            <button id="resetbtn">重置</button>
        </td>
        <!-- <td></td> -->
    </tr>
</table>
<script>
    getmovie(<?= ($_GET['id']) ?? 0 ?>)

    function getmovie(id) {
        $.get('./api/getmovie.php', {
            id
        }, function(res) {
            $('#movie').html(res);
            let id = $('#movie').val();
            getdate(id);
        })
    }

    function getdate(id) {
        $.get('./api/getdate.php', {
            id
        }, function(res) {
            $('#date').html(res);
            let movie = $('#movie').val();
            let date = $('#date').val();
            getsess(movie, date);
        })
    }

    function getsess(movie, date) {
        $.get('./api/getsess.php', {
            movie,
            date
        }, function(res) {
            $('#sess').html(res);
        })
    }
</script>