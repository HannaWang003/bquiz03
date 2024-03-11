<?php
$movieName = $Movie->find($_POST['movie'])['text'];
$date = $_POST['date'];
$sess = $_POST['sess'];
$ords = $Order->all([
    'text' => $movieName,
    'date' => $date,
    'session' => $sess
]);
$seats = [];
foreach ($ords as $ord) {
    $tmp = unserialize($ord['seats']);
    $seats = array_merge($seats, $tmp);
}
?>
<style>
    .red {
        color: red;
    }

    #room {
        width: 540px;
        height: 370px;
        margin: auto;
        padding: 19px 112px 0px 112px;
        box-sizing: border-box;
        background: url('../icon/03D04.png');
        background-repeat: no-repeat;
        background-position: center;
    }

    #seats {
        display: flex;
        flex-wrap: wrap;
    }

    .seat {
        width: 63px;
        height: 85px;
        position: relative;
    }

    .chk {
        position: absolute;
        bottom: 2px;
        right: 2px;
    }
</style>
<div id="room">
    <div id="seats">
        <?php
        for ($i = 1; $i <= 20; $i++) {
            $col = ceil($i / 5);
            $num = ($i - 1) % 5 + 1;
            echo "<div class='seat'>";
            echo "<div> $col 排 $num 號</div>";
            $s = (in_array($i, $seats)) ? 3 : 2;
            echo "<div><img src='../icon/03D0{$s}.png'></div>";
            $dis=(in_array($i, $seats))?"disabled":"";
            echo "<input type='checkbox' name='chk' value='$i' class='chk' $dis>";
            echo "</div>";
        }

        ?>
    </div>
</div>
<div>
    <div>您選擇的電影是:<span class="red"><?= $movieName ?></span></div>
    <div>您選擇的時刻是:<span class="red"><?= $date ?> - <?= $sess ?></span></div>
    <div>您已勾選<span class="red" id="num">X</span>張票，最多可以購買四張票</div>
</div>
<div class="ct">
    <button onclick="history.go(-1)">上一步</button>
    <button onclick="order()">訂購</button>
</div>
<script>
    let seats = Array();

    function order() {
        $.post('../api/checkout.php', {
                text: '<?= $movieName ?>',
                date: '<?= $date ?>',
                session: '<?= $sess ?>',
                qt: seats.length,
                seats,
            },
            function(no) {
                location.href = `?do=result&no=${no}`;
            }
        )
    }
    $('.chk').on('change', function() {
        if ($(this).prop('checked')) {
            if (seats.length + 1 <= 4) {
                seats.push($(this).val());
            } else {
                $(this).prop('checked', false);
                alert("每個人最多只能勾選四張票");
            }
        } else {
            seats.splice(seats.indexOf($(this).val()), 1)
        }
        $('#num').html(seats.length);
        console.log(seats)
    })
</script>