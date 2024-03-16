<?php
include_once "db.php";
$ondate = $Movie->find($_POST['id'])['ondate'];
$ondateS = strtotime($ondate);
$enddateS = strtotime('+ 2days', $ondateS);
$todayS = strtotime(date("Y-m-d"));
$diff = ($enddateS - $todayS) / (60 * 60 * 24);
for ($i = 0; $i <= $diff; $i++) {
    $date = date("Y-m-d", strtotime("+ $i days"));
?>
    <option value='<?= $date ?>'><?= $date ?></option>
<?php
}
?>