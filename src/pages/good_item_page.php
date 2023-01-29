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
    <script type="text/javascript" src="../js/counter.js"></script>
    <title>Просмотр товара</title>
</head>
<body>
    <?php
        echo getHeader();

        if ($_GET) {
            var_dump($_GET);
        }
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="good_item_page.php">Персики</a>
           </div>
        </main>
    </div>

    <div class="container">

        <div class="show-up-container">
            <div class="good-item-page-avatar">
                <div class="good-item-page-avatar-logo"></div>
            </div>
            
            <div class="second-col">
                <h1 class="h1" style="text-align: left; margin-bottom: 5px; margin-top: 15px;">Персики</h1>
                <div class="gray-hr"></div>

                <div class="under-hr-description flex-row">
                    <p class="show-up-description">Персики. Сладкие и сочные фрукты с цветочным ароматом.</p>

                    <div class="counter-box">
                        <p class="counter-box-money">573 руб.</p>

                        <div class="product-item-kg-counter">
                            <span class="down" onclick="deacreaseCount(event, this)">-</span>
                            <input type="text" value="1"></input>
                            <span class="up" onclick="increaseCount(event, this)">+</span>
                        </div>

                        <p class="normal-little" style="margin: 0 auto;">кг</p>
                        
                        <button class="product-button" style="margin-top: 100px;">Добавить в корзину</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: left; margin-top: 0px;">Контакты</h1>
            <p class="normal-text" style="margin-bottom: 0px;">Интернет-магазин Агро лавка Фрктов</p>
            <p class="normal-text" style="margin-bottom: 0px;">(ООО Алиберция).</p>
            <p class="normal-text" style="margin-bottom: 0px;">Телефон: +7 (495) 720-32-07</p>
            <p class="normal-text" style="margin-bottom: 0px; display: inline;">Электронная почта: </p>
            <a href="mailto:info@fruktov.pro" class="link" style="display: inline; font-size: 16px;">info@fruktov.pro</a>
            <p class="normal-text" style="margin-bottom: 110px;">ИНН 9703001558.</p>
        </div> -->
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>