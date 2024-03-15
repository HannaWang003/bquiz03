<style>
    #room {
        width: 540px;
        height: 370px;
        padding: 19px 112px 0px 112px;
        background: red;
        margin: auto;
        background: url('./icon/03D04.png');
        background-position: center;
        background-repeat: no-repeat;
        box-sizing: border-box;
    }

    .seats {
        display: flex;
        flex-wrap: wrap;
    }

    .seat {
        width: 63px;
        height: 85px;
        /* background: red; */
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
        for ($i = 1; $i <= 20; $i++) {
            $col = ceil($i / 5);
            $num = ($i - 1) % 5 + 1;
        ?>
            <div class="seat">
                <div><?= $col ?>排<?= $num ?>號</div>
                <img src="./icon/03D02.png" alt="">
                <input type="checkbox" name='seats[]' value="<?= $i ?>">
            </div>
        <?php
        }
        ?>
    </div>
</div>