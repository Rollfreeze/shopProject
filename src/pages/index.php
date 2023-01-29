<?php session_start();
    require_once "../php/advertisment_card.php";
    require_once "../php/general_page.php";
    require_once "../php/draw_cards.php";
    require_once "../php/draw_adverts.php";
    require_once "../php/sql_connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/counter.js"></script>
    <title>Фруктов-лавка</title>
</head>
<body>
    <?php
        echo getHeader();
    ?>

    <hr>

    <div class="container">
        <h1 class="h1">Интернет-магазин Фруктов - продукты, овощи и фрукты с доставкой</h1>
        <p class="normal-text">Предлагаем широкий ассортимент свежих фруктов, ягод, овощей и зелени которые обязательно порадуют вас своей свежестью и вкусом. Поставляем продукцию HoReCa в рестораны, кафе, столовые и магазины. Наши фрукты всегда первой свежести, мы являемся импортерами данного вида товаров, собираем качественные экзотические фрукты в жарких странах, и привозим ароматные плоды к вашему столу. Аппетитные овощи закупаем у проверенных агрохолдингов в России и поставщиков из ближнего зарубежья, благодаря этому удается поддерживать ассортимент овощей и зелени круглый год. Любителям здорового питания предлагаем купить сухофрукты, орехи и свежие грибы.</p>
        <div class="promo-box"></div>
        <p class="normal-text top20" style="margin-bottom: 40px;">Магазин принимает оплату любым удобным для вас способом, для оптовиков безналичный расчет, для розничных покупателей наличные и оплата картой. Доставка осуществляется своим оборудованным для перевозки продуктов транспортом. Работаем 24 часа без выходных и праздников.</p>

        <form action="catalog.php" class="promo-form">
            <button class="auth_form_button" type="submit">Перейти к просмотру товаров</button>
        </form>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>