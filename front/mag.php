<style>
td:nth-child(1) {
    background: #eee;
    padding: 5px 12px;
    width: 40%;
    text-align: center;
}

table {
    margin: 50px auto;
}
</style>
<?php
if (isset($_SESSION['mag'])) {
    to('back.php');
} else {

    if (!empty($_POST)) {
        // dd($_POST);
        if ($_POST['acc'] == 'admin' && $_POST['pw'] == '1234') {
            $_SESSION['mag'] = $_POST['acc'];
            to('back.php');
        } else {
            echo  "<script>alert('非管理者登入')</script>";
        }
    }
}

?>
<h1 class='ct'>管理者登入</h1>
<form action="?do=mag" method="post">
    <table class="all">
        <tr>
            <td>帳號</td>
            <td><input type="text" name='acc'></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name='pw'></td>
        </tr>
        <tr>
            <td colspan="2" style="background:transparent">
                <button>登入</button>
            </td>
        </tr>
    </table>
</form>