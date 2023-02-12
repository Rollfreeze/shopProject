<?php
    function draw_empty_basket() {
        $emptyBasketContainer = <<< EMPTY_BASKET
        <div class="container">
            <div class="personal-data-law-box">
                <h1 class="h1" style="text-align: left; margin-top: 0px;">Моя корзина</h1>
                <div class="empty-basket-box"></div>
    
                <div class="align-center-box">
                    <a class="link" href="catalog.php" style="display: inline; text-decoration: none; font-size: 16px">Нажмите здесь </a>
                    <p class="normal-text" style="display: inline; font-size: 16px"> чтобы продолжить покупки</p>
                </div>
            </div>
        </div>
EMPTY_BASKET;
        echo $emptyBasketContainer;
    }

    
    function draw_item_row($title, $currentAmount, $currentSum, $goodImage) {
        $item_row = <<< ITEM_ROW
        <div class="good-item-row">
            <div class="good-item-row-left">
                <div class="good-item-logo" style="background-image: url('../assets/$goodImage');"></div>
                <a href="" class="good-item-title">$title</a>
            </div>
            

            <div class="good-item-kg-amount">
                <p class="normal-bold" style="display:bloc; margin-bottom: 0px; font-size: 18px;">кг:</p>
                <div class="product-item-kg-counter">
                    <span class="down" onclick="deacreaseCount(event, this)">-</span>
                    <input type="text" value="$currentAmount"></input>
                    <span class="up" onclick="increaseCount(event, this)">+</span>
                </div>
                <div class="good-item-price">$currentSum руб.</div>
                <a href="empty_basket.php" class="delete-item-from-basket-box"></a>
            </div>
        </div>
ITEM_ROW;
        echo $item_row;
    }

    function draw_all_item_rows() {
        for ($i = 0; $i < count($_SESSION['current_basket']['goods_id']); $i++) {
            $current_id = $_SESSION['current_basket']['goods_id'][$i];


            $connection = new SQLConnection();
            $good_item = $connection->get_good($current_id);
            // var_dump($good_item);
            if ($good_item) {
                $current_ammount = $_SESSION['current_basket']['id_its_amount'][$current_id];
                $current_sum = 
                    intval($_SESSION['current_basket']['id_its_amount'][$current_id]) *
                    intval($_SESSION['current_basket']['id_its_price'][$current_id]);

                draw_item_row($good_item['title'], $current_ammount, $current_sum, $good_item['image_path_1']);
            }
        }
    }


    function draw_basket() {
        $commonWeight = array_sum($_SESSION['current_basket']['id_its_amount']);
        $common_sum = $_SESSION['current_basket']['common_sum'];
        $goods_amount = count($_SESSION['current_basket']['goods_id']);

        $basketContainerStart = <<< BASKET_START
        <div class="container">
            <div class="personal-data-law-box">
                <h1 class="h1" style="text-align: left; margin-top: 0px;">Моя корзина</h1>

                <div class="pay-row">
                    <div class="pay-box flex-row">
                        <div class="summury-col">
                            <p class="normal-bold" style="margin-bottom: 5px;">Итого:</p>
                            <p class="normal-gray" style="margin-bottom: 0px;">Общий вес: $commonWeight кг</p>
                        </div>

                        <div class="summury-money">$common_sum руб.</div>

                        <buttom class="pay-basket-button">Оформить заказ</buttom>
                    </div>
                </div>
            </div>

            <div class="basket-box">
                <div class="amount-row">
                    <div class="normal-little">В корзине товаров: $goods_amount</div>
                </div>
BASKET_START;
        echo $basketContainerStart;

        draw_all_item_rows();

        $basketContainerEnd = <<< BASKET_END
            </div>
        </div>
BASKET_END;
        echo $basketContainerEnd;
    }
?>