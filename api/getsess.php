<?php
include_once "db.php";
$movie = $Movie->find($_POST['id'])['name'];
$date = $_POST['date'];
$H = date("G");
$start = ($date == date("Y-m-d") && $H >= 14) ? (6 - ceil((24 - $H) / 2)) : 0;
for ($i = $start; $i < 5; $i++) {
    $num =  $Order->sum('qt', ['name' => $movie, 'date' => $date, 'session' => $sess[$i]]);
    $qt = 20 - $num;
    echo $num;
?>
    <option value='<?= $sess[$i] ?>'><?= $sess[$i] ?> 剩<?= $qt ?> 個座位</option>
<?php
}
