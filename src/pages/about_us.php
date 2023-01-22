<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>О компании</title>
</head>
<body>
    <?php
        require_once "../php/general_page.php";
        echo getHeader();
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="about_us.php">О компании</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: left; margin-top: 0px;">О компании</h1>
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
    </div>

    <?php
        require_once "../php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>