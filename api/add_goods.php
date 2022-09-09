<?php
include('./base.php');
if(isset($_FILES['img']['tmp_name']) && $_FILES['img']['error'] == 0){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
$_POST['sh']=1;
$_POST['no'] = str_pad($_POST['big'],2,0,STR_PAD_LEFT).str_pad($_POST['mid'],2,0,STR_PAD_LEFT).$Goods->math('MAX','id')+10;
$Goods->save($_POST);
to('../back.php?do=th');
?>