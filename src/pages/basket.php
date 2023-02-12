<?php
    session_start();
    require_once "../php/general_page.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/counter.js"></script>
    <title>Коризна</title>
</head>
<body>
    <script type="text/javascript" src="js/counter.js"></script>

    <?php
        echo getHeader();
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="basket.php">Корзина</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: left; margin-top: 0px;">Моя корзина</h1>

            <div class="pay-row">
                <div class="pay-box flex-row">
                    <div class="summury-col">
                        <p class="normal-bold" style="margin-bottom: 5px;">Итого:</p>
                        <p class="normal-gray" style="margin-bottom: 0px;">Общий вес: 1кг</p>
                    </div>

                    <div class="summury-money">174 руб.</div>

                    <buttom class="pay-basket-button">Оформить заказ</buttom>
                </div>
            </div>
        </div>

        <div class="basket-box">
            <div class="amount-row">
                <div class="normal-little">В корзине товаров: 1</div>
            </div>

            <div class="good-item-row">
                <div class="good-item-row-left">
                    <div class="good-item-logo"></div>
                    <a href="" class="good-item-title">Яблоки Гренни Смит</a>
                </div>
                

                <div class="good-item-kg-amount">
                    <p class="normal-bold" style="display:bloc; margin-bottom: 0px; font-size: 18px;">кг:</p>
                    <div class="product-item-kg-counter">
                        <span class="down" onclick="deacreaseCount(event, this)">-</span>
                        <input type="text" value="1"></input>
                        <span class="up" onclick="increaseCount(event, this)">+</span>
                    </div>
                    <div class="good-item-price">174 руб.</div>
                    <!-- <button class="delete-item-from-basket-box"></button> -->
                    <a href="empty_basket.php" class="delete-item-from-basket-box"></a>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once "../php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>