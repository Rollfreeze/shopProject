<?php

    function good_card(
        $good_id, $good_title, $good_subtitle, $good_image_path_1,
        $good_image_path_2, $good_category_id, $good_is_new,
        $good_is_leader, $good_price, $good_country_id, $good_popularity
    ) {
        $titlePlusiks = str_replace(" ", "+", $good_title);
        $subtitlePlusiks = str_replace(" ", "+", $good_subtitle);
        
        $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
        $user = $_SESSION['current_user'];
        
        $isRoot = false;
        if ($isAuth) {
            $isRoot = $user['is_root'];
        }

        $countryName = good_country_name($good_country_id);
        $score_color = score_color($good_popularity);

        $rootTools = '';
        if ($isRoot) {
            $rootTools = <<< ROOT_TOOLS

            <form method="post" class="delete-advert-form">
                <input type="hidden" name="good_id_delete" id="good_id_delete" value="$good_id"></input>
                <input type="submit" class="advert_delete_button"></input>
            </form>
            
            <form method="get" action="edit_advertisment.php" class="edit-advert-form">
                <input type="hidden" name="good_id" id="good_id" value="$good_id"></input>
                <input type="hidden" name="good_title" id="good_title" value="$good_title"></input>
                <input type="hidden" name="good_subtitle" id="good_subtitle" value="$good_subtitle"></input>
                <input type="hidden" name="good_image_path_1" id="good_image_path_1" value="$good_image_path_1"></input>
                <input type="hidden" name="good_image_path_2" id="good_image_path_2" value="$good_image_path_2"></input>
                <input type="hidden" name="good_category_id" id="good_category_id" value="$good_category_id"></input>
                <input type="hidden" name="good_is_new" id="good_is_new" value="$good_is_new"></input>
                <input type="hidden" name="good_is_leader" id="good_is_leader" value="$good_is_leader"></input>
                <input type="hidden" name="good_price" id="good_price" value="$good_price"></input>
                <input type="hidden" name="good_country_id" id="good_country_id" value="$good_country_id"></input>
                <input type="hidden" name="good_popularity" id="good_popularity" value="$good_popularity"></input>
                <input type="submit" class="advert_edit_button"></input>
            </form>
ROOT_TOOLS;
        }
        
        // $bgImage = 'background-image: url("../assets/")';
        $productLogo = '<div class="product-logo" style="' . 'background-image: url(' . '..' . "/assets/" . $good_image_path_1 . '")' . '"></div>';

        $good_card = <<< good_card
        <div class="product-item">
        
        $rootTools
        
        <a href="good_item_page.php?good_id=$good_id&good_title=$titlePlusiks&good_subtitle=$subtitlePlusiks&good_image_path_1=$good_image_path_1&good_image_path_2=$good_image_path_2&good_category_id=$good_category_id&good_is_new=$good_is_new&good_is_leader=$good_is_leader&good_price=$good_price&good_country_id=$good_country_id&good_popularity=$good_popularity">
            $productLogo
        </a>

        <a id="card_name_title" href="good_item_page.php?good_id=$good_id&good_title=$titlePlusiks&good_subtitle=$subtitlePlusiks&good_image_path_1=$good_image_path_1&good_image_path_2=$good_image_path_2&good_category_id=$good_category_id&good_is_new=$good_is_new&good_is_leader=$good_is_leader&good_price=$good_price&good_country_id=$good_country_id&good_popularity=$good_popularity" class="product-title">$good_title</a>

        <div class="product-price">
            <p class="product-money">$good_price</p>руб.
        </div>

        <div>
            <p class="country-card"><span class="country-card purple-c">$countryName<span></p>руб.
        </div>

        <div style="margin-bottom: 5px; margin-top: 5px;">
            <p class="country-card">Рейтинг: <span class="country-card $score_color">$good_popularity<span></p>руб.
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
