<h1 class="ct">會員管理</h1>

<table class="w-80 aut ct">
    <tr class="tt">
        <th>姓名</th>
        <th>會員帳號</th>
        <th>註冊日期</th>
        <th>操作</th>
    </tr>

    <?php
    $rows = $Mem->all();
    foreach ($rows as $key => $row) {
    ?>
    <tr class="pp">
        <td><?=$row['name']?></td>
        <td><?=$row['acc']?></td>
        <td><?=$row['regdate']?></td>
        <td>
            <input type="button" value="修改" onclick="location.href='?do=edit_mem&id=<?=$row['id']?>'">
            <input type="button" value="刪除" onclick="del(<?=$row['id']?>,'<?=$do?>')">
        </td>
    </tr>
    <?php
    }
    ?>
</table>