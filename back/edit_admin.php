<?php
$admin = $Admin->find($_GET['id']);
$admin['pr'] = unserialize($admin['pr']);
?>
<h1 class="ct">修改管理員權限</h1>

<form action="./api/admin.php" method="post">
<table class="w-80 aut">
    <tr>
        <th class="tt w-40">帳號</th>
        <td class="pp"><input type="text" name="acc" id="acc" value="<?=$admin['acc']?>"></td>
    </tr>
    <tr>
        <th class="tt">密碼</th>
        <td class="pp"><input type="password" name="pw" id="pw" value="<?=$admin['pw']?>"></td>
    </tr>
    <tr>
        <th class="tt">權限</th>
        <td class="pp">
            <input type="checkbox" name="pr[]" value="1" <?=in_array(1,$admin['pr'])?'checked':''?>>商品分類與管理 <br>
            <input type="checkbox" name="pr[]" value="2" <?=in_array(2,$admin['pr'])?'checked':''?>>訂單管理 <br>
            <input type="checkbox" name="pr[]" value="3" <?=in_array(3,$admin['pr'])?'checked':''?>>會員管理 <br>
            <input type="checkbox" name="pr[]" value="4" <?=in_array(4,$admin['pr'])?'checked':''?>>頁尾版權管理 <br>
            <input type="checkbox" name="pr[]" value="5" <?=in_array(5,$admin['pr'])?'checked':''?>>最新消息管理
        </td>
    </tr>

</table>
<input type="hidden" name="id" value="<?=$admin['id']?>">
<div class="ct"><input type="submit" value="修改">|<input type="reset" value="重置"></div>

</form>