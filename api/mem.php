<?php
include('./base.php');
$_POST['regdate'] = $today;
$Mem->save($_POST);
?>