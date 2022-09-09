<?php
$good = $Goods->find($_GET['id']);
?>
<h2 class="ct"><?=$good['name']?></h2>

<div class="w-90 aut d-f">
    <div class="w-50 pp m-1 d-f a-c j-c">
        <img src="./img/<?=$good['img']?>" alt="" style="height: 180px;">
    </div>
    <div class="w-50">
        <div class="pp m-1 p-10">
        分類： <?=$Type->find($good['big'])['name'].'>'.$Type->find($good['mid'])['name']?>
        </div>
        <div class="pp m-1 p-10">
            編號：<?=$good['no']?>
        </div>
        <div class="pp m-1 p-10">
            價錢：<?=$good['price']?>
        </div>
        <div class="pp m-1 p-10">簡介：<?=$good['intro']?></div>
        <div class="pp m-1 p-10">庫存：<?=$good['qt']?></div>
    </div class="w-60">
</div>
<div class="ct tt w-90 aut">
    購買數量 <input type="number" name="qt" id="qt" min="1" value="1"><img src="./icon/0402.jpg" alt="" onclick="buycart()"></a>
</div>

<script>
    function buycart(){

        let qt = $('#qt').val();

        location.href=`?do=buycart&id=<?=$good['id']?>&qt=${qt}`;
    }
</script>