<?php
$good = $Goods->find($_GET['id']);
?>

<h1 class="ct">修改商品</h1>

<form action="./api/edit_goods.php" method="post" enctype="multipart/form-data">
<table class="w-80 aut">
<tr>
    <th class="tt w-40">所屬大分類</th>
    <td class="pp">
    <select name="big" id="big">
        <?php
        $bigs = $Type->all(['parent'=>0]);
        foreach ($bigs as $key => $big) {
        ?>
        <option value="<?=$big['id']?>" <?=($good['big'] == $big['id'])?'selected':''?>><?=$big['name']?></option>
        <?php
        }
        ?>

    </select>
    </td>
</tr>
<tr>
    <th class="tt w-40">所屬中分類</th>
    <td class="pp">
        <select name="mid" id="mid">
        <?php
        $mids = $Type->all(['parent'=>$good['big']]);
        foreach ($mids as $key => $mid) {
        ?>
        <option value="<?=$mid['id']?>" <?=($good['mid'] == $mid['id'])?'selected':''?>><?=$mid['name']?></option>
        <?php
        }
        ?>
        </select>
    </td>
</tr>
<tr>
    <th class="tt w-40">商品編號</th>
    <td class="pp myNo">
        <?=$good['no']?>
    </td>
</tr>
<tr>
    <th class="tt w-40">商品名稱</th>
    <td class="pp"><input type="text" name="name" id="name" value="<?=$good['name']?>"></td>
</tr>
<tr>
    <th class="tt w-40">商品價格</th>
    <td class="pp"><input type="text" name="price" id="price" value="<?=$good['price']?>"></td>
</tr>
<tr>
    <th class="tt w-40">規格</th>
    <td class="pp"><input type="text" name="spec" id="spec" value="<?=$good['spec']?>"></td>
</tr>
<tr>
    <th class="tt w-40">庫存量</th>
    <td class="pp"><input type="text" name="qt" id="qt" value="<?=$good['qt']?>"></td>
</tr>
<tr>
    <th class="tt w-40">商品圖片</th>
    <td class="pp"><input type="file" name="img" id="img"></td>
</tr>
<tr>
    <th class="tt w-40">商品介紹</th>
    <td class="pp"><textarea name="intro" id="intro" cols="30" rows="10"><?=$good['intro']?></textarea></td>
</tr>

</table>
<input type="hidden" name="id" value="<?=$good['id']?>">
<div class="ct"><input type="submit" value="修改">|<input type="reset" value="重置">|<input type="button" value="返回" onclick="location.href='?do=th'"></div>
</form>

<script>

    $('#big').on('change',function(){
        get_mid();
    })

    $('#big,#mid').on('change',function(){
        let big =$('#big').val();
        let mid =$('#mid').val();
        $.post('./api/get_no.php',{big,mid},(res)=>{
            $('.myNo').html(res);
        })
    })

</script>