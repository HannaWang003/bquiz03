<style>
    #room {
        width: 540px;
        height: 370px;
        box-sizing: border-box;
        padding: 19px 112px 0px 112px;
        background: url('./icon/03D04.png');
        background-repeat: no-repeat;
        background-position: center;
        margin: auto;
    }

    .seats {
        display: flex;
        flex-wrap: wrap;
    }

    .seat {
        width: 63px;
        height: 85px;
        position: relative;
    }

    .seat input {
        position: absolute;
        bottom: 2px;
        right: 2px;
    }
</style>
<div id="room">
    <div class="seats">
        <?php
        $movie = $Movie->find($_POST['movie'])['name'];
        $tmps = $Order->all(['name' => $movie, 'date' => $_POST['date'], 'session' => $_POST['sess']]);
        $seats = [];
        foreach ($tmps as $tmp) {
            $seats = array_merge($seats, unserialize($tmp['seats']));
        }
        for ($i = 1; $i <= 20; $i++) {
            $col = ceil($i / 5);
            $num = (($i - 1) % 5) + 1;
        ?>
            <div class="seat">
                <div><?= $col ?> 排<?= $num ?> 號</div>
                <img src="../icon/03D0<?= (in_array($i, $seats)) ? "3" : "2" ?>.png" alt="">
                <input type="checkbox" name="seat[]" class="chk" <?= (in_array($i, $seats)) ? "disabled" : "" ?> value="<?= $i ?>">
            </div>
        <?php
        }

        ?>
    </div>
</div>
<div class="ct">
    <button id="bookBtn">訂票</button>
    <button onclick="history.go(-1)">回上一步</button>
</div>
<style>
    .red {
        color: red;
    }
</style>
<div>
    <div>您選擇的電影是:<span class="red"><?= $movie ?></span></div>
    <div>您選擇的場次是:<span class="red"><?= $_POST['date'] . "的" . $_POST['sess'] ?></span></div>
    <div>您已選擇<span class="red num">x</span>票，每個人一次最多可勾選4張票</div>
</div>
<script>
    let total = 0;
    let seats = new Array();
    $('.chk').on('click', function() {
        if ($(this).prop('checked')) {
            total++;
            if (total > 4) {
                alert("每人最多可勾選4張票");
                $(this).prop("checked", false);
                total--
            } else {
                seats.push($(this).val())
            }
        } else {
            seats.splice(seats.indexOf($(this).val()));
            total--
        }
        $('.num').html(total);
    })
    $('#bookBtn').on('click', function() {
        let name = '<?= $movie ?>'
        let date = '<?= $_POST['date'] ?>'
        let session = '<?= $_POST['sess'] ?>'
        let qt = total;
        $.post('./api/order.php', {
            name,
            date,
            session,
            qt,
            seats
        }, function(res) {
            location.href = './index.php?do=result&no=' + res;
        })
    })
</script>