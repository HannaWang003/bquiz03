
    <?php
include_once "../api/db.php";
$row = $Movie->find($_POST);
$level=[0,"普遍級","輔導級","保護級","限制級"];
// dd($row);
    ?>
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="../img/<?=$row['trailer']?>" width="300px" height="250px" controls="" style="float:right;"></video>
        <font style="font-size:24px"> <img src="../img/<?=$row['poster']?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$row['name']?>
          <input type="button" value="線上訂票" onclick="lof(&#39;?do=ord&amp;id=4&#39;)" style="margin-left:50px; padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ： <img src="../icon/03C0<?=$row['level']?>.png" style="display:inline-block;"><?=$level[$row['level']]?> </p>
        <p style="margin:3px">影片片長 ： <?=$row['length']?></p>
        <p style="margin:3px">上映日期 <?=$row['ondate']?></p>
        <p style="margin:3px">發行商 ：<?=$row['publish']?> </p>
        <p style="margin:3px">導演 ： <?=$row['director']?></p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br>
        <?=$row['intro']?>
        </p>
        </font>
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td align="center"><input type="button" value="院線片清單" onclick="location.href='index.php'"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

