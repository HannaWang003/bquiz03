<?php
include_once "db.php";
$today = date("Y-m-d");
$can_on = date("Y-m-d", strtotime("-2days"));
$movies = $Movie->all("where `sh`=1 and `ondate` between '$can_on' and '$today' order by rank");
foreach ($movies as $movie) {
    $s = ($_POST['id'] == $movie['id']) ? "selected" : "";
?>
    <option value='<?= $movie['id'] ?>' <?= $s ?>><?= $movie['name'] ?></option>
<?php
}
