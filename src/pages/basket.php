<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/sql_connection.php";
    require_once "../php/basket_helper.php";
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

    <?php
        $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
        $user = $_SESSION['current_user'];
        $isBasket = isset($_SESSION['current_basket']) && !empty($_SESSION['current_basket']['goods_id']);

        if ($isAuth && $isBasket) {
            draw_basket();
        } else {
            draw_empty_basket();
        }
        echo getFooter();
    ?>
</body>
</html>