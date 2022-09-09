<?php
include('./base.php');
$_POST['goods'] = serialize($_SESSION['cart']);
unset($_SESSION['cart']);
$_POST['no'] = date('YmdHis');
$_POST['acc'] = $_SESSION['mem'];
$_POST['orddate'] = $today;
$Ord->save($_POST);
?>