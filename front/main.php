<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <style>
                .lists {
                    width: 200px;
                    height: 240px;
                    overflow: hidden;
                    margin: auto;
                }

                .list {
                    width: 200px;
                    height: 240px;
                }

                .list img {
                    width: 100%;
                }
            </style>
            <div class="lists">
                <?php
                $posters = $Poster->all(['sh' => 1]);
                foreach ($posters as $poster) {
                ?>
                    <div class="list" data-ani="<?= $poster['ani'] ?>"><img src="./img/<?= $poster['img'] ?>" alt=""></div>
                <?php
                }
                ?>
            </div>

            <style>
                .controls {
                    width: 430px;
                    height: 100px;
                    display: flex;
                    align-items: center;
                }

                .btns {
                    width: 360px;
                    height: 100px;
                    margin: auto;
                    display: flex;
                    align-items: center;
                    overflow: hidden;
                    position: relative;
                }

                .left,
                .right {
                    width: 0;
                    border: 20px solid #000;
                    border-top-color: transparent;
                    border-bottom-color: transparent;
                }

                .left {
                    border-left-width: 0;
                }

                .right {
                    border-right-width: 0;
                }

                .btn {
                    width: 90px;
                    height: 100px;
                    flex-shrink: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: relative;
                }

                .btn img {
                    width: 60px;
                }
            </style>
            <div class="controls">
                <div class="left"></div>
                <div class="btns">
                    <?php
                    $today = date("Y-m-d");
                    $ondate = date("Y-m-d", strtotime("- 2days"));
                    $total = $Poster->count(['sh' => 1]);
                    $div = 4;
                    $pages = ceil($total / $div);
                    $now = ($_GET['p']) ?? 1;
                    $start = ($now - 1) * $div;
                    $posters = $Poster->all(['sh' => 1]);
                    foreach ($posters as $poster) {
                    ?>
                        <div class="btn"><img src="./img/<?= $poster['img'] ?>" alt=""></div>
                    <?php
                    }
                    ?>
                </div>
                <div class="right"></div>
            </div>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>
<script>
    let p = 0;
    let now = 0;
    let next = 0;
    let timer = setInterval(slide, 3000);
    let total = $('.list').length;

    function slide(n) {
        let ani = $('.list').eq(now).data('ani');
        if (typeof(n) == "undefined") {
            next = now + 1
            if (next >= total) {
                next = 0;
            }
        } else {
            next = n
        }
        switch (ani) {
            case 1:
                $('.list').eq(now).fadeOut(1000, function() {
                    $('.list').eq(next).fadeIn(1000)
                })
                break;
            case 2:
                $('.list').eq(now).hide(1000, function() {
                    $('.list').eq(next).show(1000)
                })
                break;
            case 3:
                $('.list').eq(now).slideUp(1000, function() {
                    $('.list').eq(next).slideDown(1000)
                })
                break;
        }
        now = next;
    }
    $('.left,.right').on('click', function() {
        let arror = $(this).attr('class');
        switch (arror) {
            case "left":
                if (p - 1 >= 0) {
                    p--
                }
                break;
            case "right":
                if (p + 1 <= total - 4) {
                    p += 1;
                }
                break;
        }
        $('.btn').animate({
            right: 90 * p
        });
    })
    $('.btns').hover(
        function() {
            clearInterval(timer);
        },
        function() {
            timer = setInterval(slide, 3000);
        }
    )
    $('.btn').on('click', function() {
        let idx = $(this).index();
        slide(idx)
    })
</script>