<?php
include('./base.php');
$res = $Mem->math('count','id',['acc'=>$_GET['acc']]);
echo $res;
?>