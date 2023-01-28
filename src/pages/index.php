<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Фрукты и овощи купить</title>
</head>
<body>
    <script type="text/javascript" src="../js/counter.js"></script>

    <?php
        // session_start();
        require_once "../php/advert_card.php";
        require_once "../php/advertisment_card.php";
        require_once "../php/general_page.php";
        echo getHeader();
    ?>

    <hr>

    <div class="container flex-row">
        <main class="main">
            <!-- <div class="blue-row"></div> -->

            <div class="filter-row">
                <button class="filter-item-active">Все</button>
                <button class="filter-item">Избранное</button>
                <button class="filter-item">Скоро заканчивается</button>
                <button class="filter-item">Новинки</button>
            </div>

            <div class="products-container">
                <?php
                    echo advert_card();
                    echo advert_card();
                    echo advert_card();
                    echo advert_card();
                ?>
            </div>
            <div class="products-container">
                <?php
                    echo advert_card();
                    echo advert_card();
                    echo advert_card();
                    echo advert_card();
                ?>
            </div>
            <div class="products-container">
                <?php
                    echo advert_card();
                    echo advert_card();
                    echo advert_card();
                    echo advert_card();
                ?>
            </div>
        </main>
    
        <aside class="aside">
            <!-- <div class="red-row"></div> -->

            <div class="advertisments-container">
                <?php
                    echo advertisment_card();
                    echo advertisment_card();
                    echo advertisment_card();
                    echo advertisment_card();
                    echo advertisment_card();
                    echo advertisment_card();
                ?>
            </div>
        </aside>

        
    </div>

    <div class="container">
        <h1 class="h1">Интернет-магазин Фруктов - продукты, овощи и фрукты с доставкой</h1>
        <p class="normal-text">Предлагаем широкий ассортимент свежих фруктов, ягод, овощей и зелени которые обязательно порадуют вас своей свежестью и вкусом. Поставляем продукцию HoReCa в рестораны, кафе, столовые и магазины. Наши фрукты всегда первой свежести, мы являемся импортерами данного вида товаров, собираем качественные экзотические фрукты в жарких странах, и привозим ароматные плоды к вашему столу. Аппетитные овощи закупаем у проверенных агрохолдингов в России и поставщиков из ближнего зарубежья, благодаря этому удается поддерживать ассортимент овощей и зелени круглый год. Любителям здорового питания предлагаем купить сухофрукты, орехи и свежие грибы.</p>
        <p class="normal-text top20" style="margin-bottom: 40px;">Магазин принимает оплату любым удобным для вас способом, для оптовиков безналичный расчет, для розничных покупателей наличные и оплата картой. Доставка осуществляется своим оборудованным для перевозки продуктов транспортом. Работаем 24 часа без выходных и праздников.</p>
    </div>

    <?php
        require_once "../php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>