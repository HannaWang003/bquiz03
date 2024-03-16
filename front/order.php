<form action="?do=book" method="post">
    <div>電影: <select name="movie" id="movie"></select></div>
    <div>日期: <select name="date" id="date"></select></div>
    <div>場次: <select name="sess" id="sess"></select></div>
    <button>訂票</button>
</form>
<script>
    //movie
    getmovie(<?= ($_GET['id']) ?? 0 ?>);

    function getmovie(id) {
        $.post('./api/getmovie.php', {
            id
        }, function(res) {
            $('#movie').html(res)
            let id = $('#movie').val();
            getdate(id)
        })
    }

    function getdate(id) {
        $.post('./api/getdate.php', {
            id
        }, function(res) {
            $('#date').html(res)
            let date = $('#date').val();
            let id = $('#movie').val();
            getsess(id, date)
        })
    }

    function getsess(id, date) {
        $.post('./api/getsess.php', {
            id,
            date
        }, function(res) {
            $('#sess').html(res)
        })
    }
    $('#movie').on('change', function() {
        let id = $(this).val()
        getdate(id);
    })
    $('#date').on('change', function() {
        let date = $(this).val();
        let id = $('#movie').val();
        getsess(id, date)
    })
</script>