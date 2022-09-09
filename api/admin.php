<?php
include('./base.php');
$DB = new DB($_POST['table']);
$DB->save($_POST);
?>