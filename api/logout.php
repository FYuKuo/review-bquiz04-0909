<?php
include('./base.php');
unset($_SESSION[$_GET['table']]);
to("../index.php");
?>