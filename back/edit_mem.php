<?php
$mem = $Mem->find($_GET['id']);
?>
<h1 class="ct">編輯會員資料</h1>

<form action="./api/edit_mem.php" method="post">
<table class="w-80 aut">

    <tr>
        <th class="tt">帳號</th>
        <td class="pp">
            <?=$mem['acc']?>
        </td>
    </tr>
    <tr>
        <th class="tt">密碼</th>
        <td class="pp">
            <?=str_repeat("*",strlen($mem['pw']))?>
        </td>
    </tr>
    <tr>
        <th class="tt w-40">姓名</th>
        <td class="pp"><input type="text" name="name" id="name" value="<?=$mem['name']?>"></td>
    </tr>
    <tr>
        <th class="tt">地址</th>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?=$mem['addr']?>"></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp"><input type="text" name="email" id="email" value="<?=$mem['email']?>"></td>
    </tr>
    <tr>
        <th class="tt">電話</th>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?=$mem['tel']?>"></td>
    </tr>
</table>
<input type="hidden" name="id" value="<?=$mem['id']?>">
<div class="ct"><input type="submit" value="編輯">|<input type="reset" value="重置"><input type="button" value="取消" onclick="location.href='?do=mem'"></div>

</form>