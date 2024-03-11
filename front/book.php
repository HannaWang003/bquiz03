<?php
$movieName = $Movie->find($_POST['movie'])['text'];
$date = $_POST['date'];
$sess = $_POST['sess'];
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
            $col = ceil($i/5);
            $num = ($i-1)%5+1;
            echo "<div class='seat'>";
            echo "<div> $col 排 $num 號</div>";
            echo "<div><img src='../icon/03D02.png'></div>";
            echo "<input type='checkbox' name='chk' value='' class='chk'>";
            echo "</div>";
        }

        ?>
    </div>
</div>
<div>
    <div>您選擇的電影是:<span class="red"><?= $movieName ?></span></div>
    <div>您選擇的時刻是:<span class="red"><?= $date ?> - <?= $sess ?></span></div>
    <div>您已勾選<span class="red">X</span>張票，最多可以購買四張票</div>
</div>
<script>

</script>