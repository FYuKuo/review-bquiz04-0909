<?php
$mem = $Mem->find(['acc'=>$_SESSION['mem']]);
?>
<h1 class="ct">填寫資料</h1>
<table class="w-80 aut">
    <tr>
        <th class="tt w-40">帳號</th>
        <td class="pp"><?=$mem['acc']?></td>
    </tr>
    <tr>
        <th class="tt w-40">姓名</th>
        <td class="pp"><input type="text" name="name" id="name" value="<?=$mem['name']?>"></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp"><input type="text" name="email" id="email" value="<?=$mem['email']?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?=$mem['tel']?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?=$mem['addr']?>"></td>
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
    foreach ($_SESSION['cart'] as $id => $qt) {
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

<div class="ct"><input type="button" value="確定送出" onclick="checkout()"><input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'"></div>

<script>
    function checkout(){
        let name = $('#name').val();
        let email = $('#email').val();
        let tel = $('#tel').val();
        let addr = $('#addr').val();
        let total = <?=$sum;?>;

        $.post('./api/checkout.php',{name,email,tel,addr,total},()=>{
            alert('訂購成功 \n 感謝您的選購');
            location.href='./index.php';
        })
    }
</script>
