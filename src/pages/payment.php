<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Информация о способах оплаты</title>
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
                <a class="bread-bar-item" href="personal.php">Способы оплаты</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: left; margin-top: 0px;">Оплата</h1>

            <div class="warning-box flex-row">
                <div class="warning"></div>
                <p class="warning-note">Способ оплаты любого заказа Вы выбираете при его оформлении. Оплата в Интернет-магазине производится только в рублях. После подтверждения заказа оператором Интернет-магазина способ оплаты изменен быть не может.</p>
            </div>

            <h2 class="h2">Наличный расчет</h2>
            <p class="normal-text" style="margin-bottom: 0px;">Самый распространенный и удобный способ оплаты покупок. Вы отдаете сотруднику Службы доставки деньги при получении заказа.</p>
            
            <h2 class="h2" style="margin-top: 30px;">Оплата банковской картой</h2>
            <p class="normal-text" style="margin-bottom: 0px;">Мы принимаем онлайн-платежи по cледующим платежным системам: Visa, MasterCard, JCB, DCL</p>
            <div class="payments-ways-row flex-row">
                <div class="visa"></div>
                <div class="masterCard"></div>
                <div class="jcb"></div>
                <div class="blue-circle"></div>
            </div>
            <p class="normal-text" style="margin-bottom: 0px;">К оплате не принимаются банковские карты Visa и MasterCard без кода CVV2 / CVC2.</p>
            <p class="normal-text" style="margin-bottom: 0px;">Оплата заказа производится после его оформления и сборки, наши операторы озвучат вам точную сумму.</p>
            <p class="normal-text" style="margin-bottom: 0px;">Минимальная сумма платежа составляет 3000 рублей.</p>
            <p class="normal-text" style="margin-bottom: 0px;">В случае, если Вы оплатили заказ банковской карточкой и затем отказались от него, возврат переведенных средств производится на Ваш банковский (карточный) счет.</p>

            <h2 class="h2" style="margin-top: 30px;">Безналичный расчет</h2>
            <p class="normal-text" style="margin-bottom: 0px;">Это удобный способ оплаты в случае, если заказ оформляется на юридическое лицо. Минимальная сумма заказа для выставления счёта составляет 3500 рублей.</p>
            <p class="normal-text" style="margin-bottom: 40px;">При получении заказа необходимо иметь при себе доверенность от организации-заказчика и удостоверение личности. Вместе с заказом выдаются счет, счет-фактура и накладная.</p>
        </div>
    </div>

    <?php
        require_once "../php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>