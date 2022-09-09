<?php
include('./base.php');
$no = str_pad($_POST['big'],2,0,STR_PAD_LEFT).str_pad($_POST['mid'],2,0,STR_PAD_LEFT).$Goods->math('MAX','id')+10;
echo $no;
echo "<input type='hidden' name='no' value='$no'>";

?>