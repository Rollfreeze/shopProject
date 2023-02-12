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


    function draw_basket() {
        $basketContainer = <<< BASKET
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
                        <a href="empty_basket.php" class="delete-item-from-basket-box"></a>
                    </div>
                </div>
            </div>
        </div>
BASKET;
        echo $basketContainer;
    }
?>