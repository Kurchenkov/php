<?php
include_once "../models/db_goods.php";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Интернет-магазин путешествий</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
    </head>

    <body>
        <div id="container">
            <? include "../templates/header.php"; ?>
                <div class="leftblock">
                    <? include "../templates/menu.php"; ?>
                </div>
                <div class="content">
                    <h1>Интернет-магазин путешествий</h1>
                    <p class="hello">Добро пожаловать в наш интернет-магазин путешествий, у нас большой выбор туристических путевок для Вашего отдыха.</p>
                    <hr>
                    <?php
        $goods = goods_all($link);
        if($goods){
            foreach ($goods as $good){?>
                        <div class="item">
                            <a href="item.php?id=<?=$good[id]?>"><img src="<?=$good[small_src]?>" alt="<?=$good[name]?>" title="<?=$good[name]?>"></a>
                            <h3 class="item-name">
                                <a href="item.php?id=<?=$good[id]?>">
                                    <?=$good[name]?>
                                </a>
                            </h3>
                            <p class="price">
                                <?=$good[price]?>р.</p>
                            <p class="add-to-basket"><a href="#" title="Добавить в корзину">Купить</a></p>
                        </div>
                        <?}
        }
        ?>
                </div>
                <footer>
                    <? include "../templates/footer.php"; ?>
                </footer>
        </div>
    </body>

    </html>