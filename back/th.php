<h1 class="ct">商品分類</h1>

<div class="ct">
    新增大分類<input type="text" name="big" id="big"><input type="button" value="新增" onclick="add_type('big')">
</div>
<div class="ct">
    新增中分類
    <select name="bigtype" id="bigtype">

    </select>
    <input type="text" name="mid" id="mid"><input type="button" value="新增" onclick="add_type('mid')">
</div>

<table class="w-80 aut">
<?php
$bigs = $Type->all(['parent'=>0]);
foreach ($bigs as $key => $big) {
?>
<tr class="tt">
    <td><?=$big['name']?></td>
    <td class="ct"><input type="button" value="修改" onclick="edit_type(<?=$big['id']?>,'<?=$big['name']?>')"><input type="button" value="刪除" onclick="del(<?=$big['id']?>,'type')"></td>
</tr>
<?php
$mids = $Type->all(['parent'=>$big['id']]);
foreach ($mids as $key => $mid) {
?>
<tr class="pp ct">
    <td><?=$mid['name']?></td>
    <td><input type="button" value="修改" onclick="edit_type(<?=$mid['id']?>,'<?=$mid['name']?>')"><input type="button" value="刪除" onclick="del(<?=$mid['id']?>,'type')"></td>
</tr>
<?php
}
?>
<?php
}
?>
</table>

<h1 class="ct">商品管理</h1>
<div class="ct"><input type="button" value="新增商品" onclick="location.href='?do=add_goods'"></div>
<div class="ct">
    <select name="" id="">
        <option value="">全部商品</option>
    </select>
</div>
<table class="w-80 aut ct">
    <tr class="tt">
        <th>編號</th>
        <th>商品名稱</th>
        <th>庫存量</th>
        <th>狀態</th>
        <th>操作</th>
    </tr>
    <?php
    $rows = $Goods->all();
    foreach ($rows as $key => $row) {
    ?>
    <tr class="pp">
        <td><?=$row['no']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['qt']?></td>
        <td><?=($row['sh'] == 1)?'販售中':'已下架'?></td>
        <td>
        <input type="button" value="修改" onclick="location.href='?do=edit_goods&id=<?=$row['id']?>'">
        <input type="button" value="刪除" onclick="del(<?=$row['id']?>,'goods')"><br>
        <input type="button" value="上架" onclick="sh(<?=$row['id']?>,1,'goods')">
        <input type="button" value="下架" onclick="sh(<?=$row['id']?>,0,'goods')">
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
    get_big();

    function edit_type(id,name){
        name = prompt('請輸入您要修改的分類名稱',name);

        if(name != null){

            $.post('./api/edit_type.php',{id,name},()=>{
                location.reload();
            })
        }

    }

    function add_type(type){
        let name = $(`#${type}`).val();
        let parent;
        switch (type) {
            case 'big':
                parent = 0;
            break;
            case 'mid':
                parent = $('#bigtype').val();
            break;
        }

        $.post('./api/add_type.php',{name,parent},()=>{
            location.reload();
        })
    }
</script>