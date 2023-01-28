<?php
    function advert_card() {
        $ADVERT_CARD = <<< ADVERT_CARD
        <div class="product-item">
        <form class="delete-advert-form">
            <input type="submit" class="advert_delete_button"></input>
        </form>
        <form class="edit-advert-form">
            <input type="submit" class="advert_edit_button"></input>
        </form>
        
        <div class="product-logo"></div>

        <a href="good_item_page.php" class="product-title">Персики</a>

        <div class="product-price">
            <p class="product-money">570</p>руб.
        </div>

        <button class="product-button">Купить продукт</button>

        <div class="product-item-kg-counter">
            <span class="down" onclick="deacreaseCount(event, this)">-</span>
            <input type="text" value="1"></input>
            <span class="up" onclick="increaseCount(event, this)">+</span>
        </div>

        <p class="product-description">Персики. Сладкие и сочные фрукты с цветочным ароматом.</p>
    </div>
ADVERT_CARD;

        return $ADVERT_CARD;
    }
?>