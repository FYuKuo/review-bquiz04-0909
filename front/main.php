<?php
$getType = ($_GET['type'])??0;

if($getType == 0){
    $goods = $Goods->all(['sh'=>1]);
    $title = '全部商品';
}else{
    $type = $Type->find($getType);
    if($type['parent'] == 0){
        $goods = $Goods->all(['sh'=>1,'big'=>$getType]);
        $title = $type['name'];

    }else{
        $goods = $Goods->all(['sh'=>1,'mid'=>$getType]);
        $title = $Type->find($type['parent'])['name'].'>'.$type['name'];
    }
}
?>

<h2><?=$title?></h2>

<?php
foreach ($goods as $key => $good) {
?>
<div class="w-80 aut d-f">
    <div class="w-40 pp m-1 d-f a-c j-c">
        <a href="?do=intro&id=<?=$good['id']?>">
            <img src="./img/<?=$good['img']?>" alt="" style="height: 120px;">
        </a>
    </div>
    <div class="w-60">
        <div class="tt ct m-1 p-10"><?=$good['name']?></div>
        <div class="pp m-1 d-f j-b p-10">
            <div>
                價錢：<?=$good['price']?>
            </div>
            <a href="?do=buycart&id=<?=$good['id']?>&qt=1">
                <img src="./icon/0402.jpg" alt="">
            </a>
        </div>
        <div class="pp m-1 p-10">規格：<?=$good['spec']?></div>
        <div class="pp m-1 p-10">簡介：<?=mb_substr($good['intro'],0,25)?></div>
    </div class="w-60">
</div>
<?php
}
?>