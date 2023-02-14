<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/sql_connection.php";
    require_once "../php/country_helper.php";
    require_once "../php/orders_helper.php";
    $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
    if (!$isAuth || !isset($_GET['order_id'])) header('Location: http://localhost/pages/catalog.php');
    $order_id = $_GET['order_id'];
    $goods_in_order = $_GET['goods_in_order'];
    $order_price = $_GET['order_price'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Детали заказа</title>
</head>
<body>
    <?php
        echo getHeader();
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar" style="width: 395px;">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="my_orders_page.php">Мои заказы</a>
                <span class="bread-slesh">/</span>
                <?php
                echo "<a class='bread-bar-item' href='order_details_page.php?order_id=$order_id&order_price=$order_price&goods_in_order=$goods_in_order'>Детали заказа</a>";
                ?>
                
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: center; margin-top: 0px;">Детали заказа</h1>

            <?php
                $connection = new SQLConnection();
                $order_elements = $connection->get_all_order_elements($order_id);
            ?>

            <?php
                echo '<div class="basket-box">';
                $goods_in_basket_row = <<< GOOODS_IN_BASKET
                <div class="flex-row amount-row-2">
                    <div id="goods_amount" class="normal-little">Общая сумма данного заказа: <span class="money-span">$order_price</span> руб.</div>
                    <div id="goods_amount" class="normal-little">Товаров в текущем заказе: $goods_in_order</div>
                </div>
GOOODS_IN_BASKET;
                echo $goods_in_basket_row;

                if ($order_elements) {
                    for ($i = 0; $i < count($order_elements); $i++) {
                        $good_id = $order_elements[$i]['good_id'];
                        $title = $order_elements[$i]['name'];
                        $amount = $order_elements[$i]['amount'];
                        $totalCost = $order_elements[$i]['total_cost'];
                        $image = $order_elements[$i]['image'];
                        draw_ordered_item_row(
                            $good_id,
                            $title,
                            $amount,
                            $totalCost,
                            $image,
                        );
                    }
                }

                echo '</div>';
            ?>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>