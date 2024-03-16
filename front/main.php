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
                <div class="list" data-ani="<?= $poster['ani'] ?>">
                    <img src="./img/<?= $poster['img'] ?>" alt="">
                    <div class='ct'><?= $poster['name'] ?></div>
                </div>
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
                display: flex;
                align-items: center;
                overflow: hidden;
                margin: auto;
                position: relative;
            }

            .btn {
                width: 90px;
                height: 100px;
                flex-shrink: 0;
                text-align: center;
                position: relative;
            }

            .btn img {
                width: 60px;
            }

            .left,
            .right {
                width: 0;
                border: 20px solid #000;
                border-top-color: transparent;
                border-bottom-color: transparent;
            }

            .left {
                border-left-width: 0
            }

            .right {
                border-right-width: 0
            }
            </style>
            <div class="controls">
                <div class="left"></div>
                <div class="btns">
                    <?php
                    foreach ($posters as $poster) {
                    ?>
                    <div class="btn">
                        <img src="./img/<?= $poster['img'] ?>">
                        <div class='ct'><?= $poster['name'] ?></div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="right"></div>
            </div>
        </div>
    </div>
</div>
<script>
let p = 0;
let now = 0;
let next = 0;
let total = $('.list').length;
let timer = setInterval(slide, 3000);

function slide(n) {
    let ani = $('.list').eq(now).data('ani');
    if (typeof(n) == "undefined") {
        next = now + 1;
        if (next >= total) {
            next = 0
        }
    } else {
        next = n;
    }
    switch (ani) {
        case 1:
            $('.list').eq(now).fadeOut(1000, () => {
                $('.list').eq(next).fadeIn(1000)
            })
            break;
        case 2:
            $('.list').eq(now).hide(1000, () => {
                $('.list').eq(next).show(1000)
            })
            break;
        case 3:
            $('.list').eq(now).slideUp(1000, () => {
                $('.list').eq(next).slideDown(1000)
            })
            break;
    }
    now = next;
}
$('.left,.right').on('click', function() {
    let arrow = $(this).attr('class');
    console.log(arrow)
    switch (arrow) {
        case "left":
            if (p - 1 > 0) {
                p--
            }
            break;
        case "right":
            if (p + 1 <= total - 4) {
                p++
            }
            break;
    }
    $('.btn').animate({
        right: 90 * p
    });
})
$('.btns').hover(function() {
    clearInterval(timer)
}, function() {
    timer = setInterval(slide, 3000)
})
$('.btn').on('click', function() {
    let idx = $(this).index();
    slide(idx)
})
</script>

<div class="half">
    <?php
    $ondate = date("Y-m-d", strtotime("-2 dayss"));
    $today = date("Y-m-d");
    $total = $Movie->count("where `sh`=1 && `ondate` between '$ondate' and '$today'");
    $div = 4;
    $pages = ceil($total / $div);
    $now = ($_GET['p']) ?? 1;
    $start = ($now - 1) * $div;
    $movies = $Movie->all("where `sh`=1 && `ondate` between '$ondate' and '$today' order by rank limit $start,$div");
    ?>
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <style>
        .movies {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 5px;
        }

        .movie {
            width: 49%;
            border: 1px solid white;
            height: 155px;
            box-sizing: border-box;
            padding: 2px;
        }

        .movie>div {
            display: inline-block;
        }

        .movie button {
            font-size: 13px;
        }
        </style>
        <div class="movies">
            <?php
            foreach ($movies as $movie) {
            ?>
            <div class="movie">
                <div style="width:35%;"><img src="./img/<?= $movie['poster'] ?>" style="width:100%"></div>
                <div style="width:63%;background:red">
                    <div><?= $movie['name'] ?></div>
                    <div style="font-size:13px;">分級: <img src="./icon/03C0<?= $movie['level'] ?>.png" alt=""></div>
                    <div style="font-size:13px;">上映日期: <?= $movie['ondate'] ?></div>
                </div>
                <div style="width:100%;display:flex;justify-content:space-evenly;">
                    <button>劇情介紹</button><button
                        onclick="location.href='?do=order&id=<?= $movie['id'] ?>'">線上訂票</button>
                </div>
            </div>

            <?php
            }
            ?>
        </div>
        <div class="ct">
            <?php
            for ($i = 1; $i <= $pages; $i++) {
            ?>
            <a href="?do=main&p=<?= $i ?>"><?= $i ?></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>