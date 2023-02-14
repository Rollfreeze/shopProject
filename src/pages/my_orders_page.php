<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/sql_connection.php";
    require_once "../php/country_helper.php";
    require_once "../php/redirect_helper.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Мои заказы</title>
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
                <a class="bread-bar-item" href="my_orders_page.php">Мои заказы</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: center; margin-top: 0px;">Просмотр моих заказов</h1>
            
            <?php
                echo '<div class="basket-box">';

                // <div class="amount-row">
                //     <div id="goods_amount" class="normal-little">В корзине товаров: $goods_amount</div>
                // </div>
                // $connection = new SQLConnection();



                echo '</div>';
            ?>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>