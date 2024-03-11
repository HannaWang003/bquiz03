<div id="book">
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
                    <input type="submit" value="確定">
                    <input type="reset" value="重置">
                </td>
                <!-- <td></td> -->
            </tr>
        </table>
    </form>
</div>
<script>
    getmovie(<?= ($_GET['id']) ?? 0 ?>)

    //change
    $('#movie').on('change', function() {
        getdate($('#movie').val());
    })
    $('#date').on('change', function() {
        getsess($('#movie').val(), $('#date').val());
    })
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