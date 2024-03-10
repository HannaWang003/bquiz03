<?php
if(isset($_SESSION['mag'])){
    to("back.php");
    exit();
  }
if(isset($_GET['error'])){
    ?>    
    <script>alert('<?=$_GET['error']?>')</script>
    <?php
  }
?>
<style>
    td{
        padding:10px;
    }
</style>
<h2 class="ct">管理者登入</h2>
<form action="./api/chk.php?do=<?=$do?>" method="post">
<table width="80%" style="background:#ccc;color:black;margin:10px auto;">
    <tr>
        <td>管理帳號: <input type="text" name="acc"></td>
        <td>密碼: <input type="text" name="pw"></td>
    </tr>
</table>
<div class="ct">
    <input type="submit" value="登入">&nbsp;&nbsp<input type="reset" value="重置">
</div>
</form>
