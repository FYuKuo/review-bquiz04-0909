<?php
include('./base.php');
$_POST['pr'] = serialize($_POST['pr']);
$Admin->save($_POST);
to('../back.php')
?>