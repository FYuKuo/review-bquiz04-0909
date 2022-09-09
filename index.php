<?php
$do = ($_GET['do'])??'main';
include('./api/base.php');
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/js.js"></script>
    <script src="./js//jquery-3.4.1.min.js"></script>
</head>

<body>
    <div id="main">
        <div id="top">
            <a href="./index.php">
                <img src="./icon/0416.jpg">
            </a>
            <div style="padding:10px;">
                <a href="./index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a>
                |
                <?php
                if(isset($_SESSION['mem'])){
                ?>
                <a href="./api/logout.php?table=mem">登出</a>
                <?php
                }else{
                ?>
                <a href="?do=login">會員登入</a>
                <?php
                }
                ?>
                |
                <?php
                if(isset($_SESSION['admin'])){
                ?>
                <a href="./back.php">返回管理</a>
                <?php
                }else{
                ?>
                <a href="?do=admin">管理登入</a>
                <?php
                }
                ?>

            </div>
            <marquee>年終特賣會開跑了 &nbsp;&nbsp; 情人節特惠活動</marquee>
        </div>

        <div id="left" class="ct">
            <!-- 側邊選單放這裡 -->
            <div style="min-height:400px;">

            <a href="?type=0">全部商品(<?=$Goods->math('COUNT','id',['sh'=>1])?>)</a>
            <?php
            $bigs = $Type->all(['parent'=>0]);
            foreach ($bigs as $key => $big) {
            ?>
            <div class="big_out">
                <a href="?type=<?=$big['id']?>"><?=$big['name']?>(<?=$Goods->math('COUNT','id',['sh'=>1,'big'=>$big['id']])?>)</a>

                <div class="mid_out" style="display: none;">
                <?php
                $mids = $Type->all(['parent'=>$big['id']]);
                foreach ($mids as $key => $mid) {
                ?>
                <a href="?type=<?=$mid['id']?>" style="background-color: lightblue;"><?=$mid['name']?>(<?=$Goods->math('COUNT','id',['sh'=>1,'mid'=>$mid['id']])?>)</a>
                <?php
                }
                ?>
                </div>
            </div>
            <?php
            }
            ?>

            </div>


            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>

        <div id="right">
            <?php
            if(file_exists('./front/'.$do.'.php')){
                include('./front/'.$do.'.php');
            }else{
                include('./front/main.php');
            }
            ?>
        </div>

        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            <?=$Bot->find(1)['text']?>
        </div>
    </div>

</body>

</html>

<script>
    $('.big_out').hover(function(){
        $(this).children('.mid_out').show();
    },function(){
        $(this).children('.mid_out').hide();

    })
</script>