<?php

    function good_card(
        $good_title, $good_subtitle, $good_image_path_1,
        $good_image_path_2, $good_category_id, $good_is_new,
        $good_is_leader, $good_price, $good_country_id, $good_popularity
    ) {
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
        
        // $bgImage = 'background-image: url("../assets/")';
        $productLogo = '<div class="product-logo" style="' . 'background-image: url(' . '..' . "/assets/" . $good_image_path_1 . '")' . '"></div>';

        $good_card = <<< good_card
        <div class="product-item">
        
        $rootTools

        $productLogo
        
        <a href="good_item_page.php" class="product-title">$good_title</a>

        <div class="product-price">
            <p class="product-money">$good_price</p>руб.
        </div>

        <button class="product-button">Купить продукт</button>

        <div class="product-item-kg-counter">
            <span class="down" onclick="deacreaseCount(event, this)">-</span>
            <input type="text" value="1"></input>
            <span class="up" onclick="increaseCount(event, this)">+</span>
        </div>

        <p class="product-description">$good_subtitle</p>
    </div>
good_card;

        return $good_card;
    }
