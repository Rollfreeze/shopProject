<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/sql_connection.php";
    require_once "../php/basket_helper.php";
?>

<?php
    $isOrdered = isset($_POST['order_phone']) && isset($_POST['order_address']);
    if ($isOrdered) {
        $connection = new SQLConnection();

        $name = $_SESSION['current_user']['user_name'];
        $phone = $_POST['order_phone'];
        $address = $_POST['order_address'];
        $totalCost = $_SESSION['current_basket']['common_sum'];
        $addOrderID = $connection->add_order($name, $phone, $totalCost, $address);

        // Если заказ создан, то значит у нас есть этот id.
        // Следовательно, по этому id добавляем детали покупки
        if ($addOrderID) {
            for ($i = 0; $i < count($_SESSION['current_basket']['goods_id']); $i++) {
                $currentID = $_SESSION['current_basket']['goods_id'][$i];
                $currentOrderElementData = $connection->get_good($currentID);
                if ($currentOrderElementData) {
                    $amountOfThisGoodInBasket = $_SESSION['current_basket']['id_its_amount'][$currentID];
                    $positionTotalCost = $_SESSION['current_basket']['id_its_price'][$currentID] * $amountOfThisGoodInBasket;
                    $connection->add_order_element(
                        $addOrderID,
                        $currentOrderElementData['title'],
                        $currentOrderElementData['image_path_1'],
                        $amountOfThisGoodInBasket,
                        $positionTotalCost,
                        $currentID,
                    );
                }
            }
            unset($_SESSION['current_basket']);
        }
    }
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
        echo '<div class="container">';
            if ($isOrdered && $addOrderID) echo '<h2 class="green_alert">Заказ успешно оформлен!</h2>';
            else if ($isOrdered && !$addOrderID) echo '<h2 class="red_alert">Ой, что-то пошло не так. Попробуйте, пожалуйста, позже...</h2>';
        echo '</div>';
    ?>

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