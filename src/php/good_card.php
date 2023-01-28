<?php
    function good_card() {
        $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
        $user = $_SESSION['current_user'];
        
        $isRoot = false;
        if ($isAuth) {
            $isRoot = $user['is_root'];
        }

        $rootTools = '';
        if ($isRoot) {
            $rootTools = <<< ROOT_TOOLS
            <form class="delete-advert-form ">
                <input type="submit" class="advert_delete_button"></input>
            </form>
            <form class="edit-advert-form">
                <input type="submit" class="advert_edit_button"></input>
            </form>
ROOT_TOOLS;
        }


        $good_card = <<< good_card
        <div class="product-item">
        $rootTools
        
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
good_card;

        return $good_card;
    }
?>