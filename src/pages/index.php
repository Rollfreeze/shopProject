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

    <!-- <hr> -->

    <div class="container">
        <h1 class="h1">Интернет-магазин Фруктов - продукты, овощи и фрукты с доставкой</h1>
        <p class="normal-text">Предлагаем широкий ассортимент свежих фруктов, ягод, овощей и зелени которые обязательно порадуют вас своей свежестью и вкусом. Поставляем продукцию HoReCa в рестораны, кафе, столовые и магазины. Наши фрукты всегда первой свежести, мы являемся импортерами данного вида товаров, собираем качественные экзотические фрукты в жарких странах, и привозим ароматные плоды к вашему столу. Аппетитные овощи закупаем у проверенных агрохолдингов в России и поставщиков из ближнего зарубежья, благодаря этому удается поддерживать ассортимент овощей и зелени круглый год. Любителям здорового питания предлагаем купить сухофрукты, орехи и свежие грибы.</p>
        <p class="normal-text top20" style="margin-bottom: 40px;">Магазин принимает оплату любым удобным для вас способом, для оптовиков безналичный расчет, для розничных покупателей наличные и оплата картой. Доставка осуществляется своим оборудованным для перевозки продуктов транспортом. Работаем 24 часа без выходных и праздников.</p>
        
        <div class="flex-row">
            <div class="promo-box"></div>
            <div class="promo-box-2"></div>
        </div>

        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: left; margin-top: 15px;">О компании</h1>
            <p class="normal-text">Компания  основана в 2008 году, на сегодняшний день в числе лидеров по  поставкам свежих овощей и фруктов.</p>
            <p class="normal-text">Товарный ассортимент интернет-магазина «Агро Лавка Фруктов» составляет сотни наименований различной продукции: овощи, фрукты, напитки, бакалея. </p>
            <h2 class="h2">Партнеры компании.</h2>
            <p class="normal-text">Мы являемся импортерами свежих овощей и фруктов из Таиланда, ЮАР, Чили, Израиля и т.д. а также обладаем прямыми контактами со странами СНГ. Заключены договора с фермерскими хозяйствами Липецкого, Тамбовского, Рязанского, Воронежского и Краснодарского края. </p>
            <p class="normal-text">Настоящее согласие распространяется на следующие Ваши персональные данные: фамилия, имя и отчество, адрес электронной почты, почтовый адрес доставки заказов, контактный телефон, платёжные реквизиты.</p>
            <h2 class="h2">Ресурсы Компании.</h2>
            <p class="normal-text" style="margin-bottom: 0px;">1. Складские помещения: более 1600 кв.метров оборудованных холодильными установками.</p>
            <p class="normal-text" style="margin-bottom: 0px;">2. Собственная служба доставки с автопарком более 20-и машин.</p>
            <p class="normal-text" style="margin-bottom: 0px;">3. Квалифицированный персонал.</p>
            <p class="normal-text" style="margin-bottom: 40px;">4. Прием заказов 24 часа - 364 дня в году.</p>
        </div>

        <form action="catalog.php" class="promo-form">
            <button class="auth_form_button" type="submit">Перейти к просмотру товаров</button>
        </form>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>