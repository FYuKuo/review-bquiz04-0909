<div class="ct my-10">
<input type="button" value="新增" onclick="location.href='?do=add_admin'">
</div>

<table class="w-80 aut ct">
    <tr class="tt">
        <th class="w-33">帳號</th>
        <th class="w-33">密碼</th>
        <th class="w-33">管理</th>
    </tr>
    <?php
    $rows = $Admin->all();
    foreach ($rows as $key => $row) {
    ?>
    <tr class="pp">
        <td><?=$row['acc']?></td>
        <td><?=str_repeat("*",strlen($row['pw']))?></td>
        <td>
            <?php
            if($row['acc'] == 'admin'){
                echo "此帳號為最高權限";
            }else{
            ?>            
            <input type="button" value="修改" onclick="location.href='?do=edit_admin&id=<?=$row['id']?>'">
            <input type="button" value="刪除" onclick="del(<?=$row['id']?>,'<?=$do?>')">
            <?php
            }
            ?>            
        </td>
    </tr>
    <?php
    }
    ?>
</table>