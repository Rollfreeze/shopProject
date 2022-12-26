<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleBase.css">
    <link rel="stylesheet" href="style.css">
    <title>Коризна</title>
</head>
<body>
    <script type="text/javascript" src="js/counter.js"></script>

    <?php
        require_once "php/general_page.php";
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
            <div class="empty-basket-box"></div>

            <div class="align-center-box">
                <a class="link" href="index.php" style="display: inline; text-decoration: none; font-size: 16px">Нажмите здесь </a>
                <p class="normal-text" style="display: inline; font-size: 16px"> чтобы продолжить покупки</p>
            </div>
        </div>
    </div>

    <?php
        require_once "php/general_page.php";
        echo getFooter();
    ?>
</body>
</html>