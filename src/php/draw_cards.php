<?php
    require_once "../php/good_card.php";
    require_once "../php/sql_connection.php";

    function draw_goods() {
        $connection = new SQLConnection();
        if (isset($_SESSION['current_filters'])) {
            $current_filters = $_SESSION['current_filters'];

            $min = $current_filters['price_from'];
            $max = $current_filters['price_to'];
            $price = "(`price` BETWEEN $min AND $max)";


            $isEkzotic = $current_filters['ekzotic'] ? '(`category_id` = 1)' : '""';
            $isGribs = $current_filters['gribs'] ? '(`category_id` = 2)' : '""';
            $isYagods = $current_filters['yagods'] ? '(`category_id` = 3)' : '""';
            $isFruits = $current_filters['fruits'] ? '(`category_id` = 4)' : '""';
            $isVegetables = $current_filters['vegetables'] ? '(`category_id` = 5)' : '""';

            if (($isEkzotic == '') && ($isGribs == '') && ($isYagods == '') && ($isFruits == '') && ($isVegetables == '')) $category = '';
            else $category = "($isEkzotic or $isGribs or $isYagods or $isFruits or $isVegetables)";


            if ($current_filters['select_good_country_id'] == 'all' || $current_filters['select_good_country_id'] == '0') {
                $country = "(`country_id` = 1 or `country_id` = 2 or `country_id` = 3 or `country_id` = 4 or `country_id` = 5)";
            } else {
                $select_good_country_id = $current_filters['select_good_country_id'];
                $country = "(`country_id` = $select_good_country_id)";
            }

            $querry = "SELECT * FROM `goods` WHERE $price AND $category AND $country;";

            var_dump($querry);

            $good_cards = $connection->get_filter_goods($querry);
        } else {
            $good_cards = $connection->get_all_goods();
        }



        if ($good_cards) {
            // echo "<pre>";
            // var_dump($good_cards);
            // echo "</pre>";
            
            for ($i = 0; $i < ceil(count($good_cards) / 4); $i++) {
                echo '<div class="products-container">';
                for ($j = $i * 4; $j < $i * 4 + 4; $j++) {
                    if ($j == count($good_cards)) break;
                    echo good_card(
                        $good_cards[$j]['id'], $good_cards[$j]['title'], $good_cards[$j]['subtitle'],
                        $good_cards[$j]['image_path_1'], $good_cards[$j]['image_path_2'],
                        $good_cards[$j]['category_id'], $good_cards[$j]['is_new'],
                        $good_cards[$j]['is_leader'], $good_cards[$j]['price'],
                        $good_cards[$j]['country_id'], $good_cards[$j]['popularity']
                    );
                }
                echo '</div>';
            }
        } else {
            echo "<div class='empty_goods'>Не удалось найти товары, возможно, они скоро появятся</div>";
        }
    }
?>