<?php
include('./base.php');
$Bot->save(['id'=>1,'text'=>$_POST['text']]);
to('../back.php?do=bot');
?>