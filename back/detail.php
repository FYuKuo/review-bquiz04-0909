<?php
$order = $Ord->find($_GET['id']);
$goods = unserialize($order['goods']);
?>

<h1 class="ct">訂單編號 <span style="color: red;"><?=$order['no']?></span></h1>
<table class="w-80 aut">
    <tr>
        <th class="tt w-40">會員帳號</th>
        <td class="pp"><?=$order['acc']?></td>
    </tr>
    <tr>
        <th class="tt w-40">姓名</th>
        <td class="pp"><?=$order['name']?></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp"><?=$order['email']?></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp"><?=$order['tel']?></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp"><?=$order['addr']?></td>
    </tr>

</table>
<table class="w-80 aut ct">
<tr class="tt">
    <th class="w-40">商品名稱</th>
    <th>編號</th>
    <th>數量</th>
    <th>單價</th>
    <th>小計</th>
</tr>
<?php
    $sum =0;
    foreach ($goods as $id => $qt) {
        $good = $Goods->find($id);
        $sum += $good['price']*$qt;
    ?>
    <tr class="pp">
        <td><?=$good['name']?></td>
        <td><?=$good['no']?></td>
        <td><?=$qt?></td>
        <td><?=$good['price']?></td>
        <td><?=$good['price']*$qt?></td>
    </tr>
    <?php
    }
    ?>

</table>
<div class="tt w-80 aut ct">
總價：<?=$sum?>
</div>

<div class="ct"><input type="button" value="返回" onclick="location.href='?do=order'"></div>