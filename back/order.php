<h1 class="ct">訂單管理</h1>

<table class="w-80 aut ct">
    <tr class="tt">
        <th>訂單編號</th>
        <th>金額</th>
        <th>會員帳號</th>
        <th>姓名</th>
        <th>下單時間</th>
        <th>操作</th>
    </tr>
    <?php
    $rows = $Ord->all();
    foreach ($rows as $key => $row) {
    ?>
    <tr class="pp">
        <td>
            <a href="?do=detail&id=<?=$row['id']?>">
                <?=$row['no']?>
            </a>
        </td>
        <td><?=$row['total']?></td>
        <td><?=$row['acc']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['orddate']?></td>
        <td>
        <input type="button" value="刪除" onclick="del(<?=$row['id']?>,'ord')">
        </td>
    </tr>
    <?php
    }
    ?>
</table>