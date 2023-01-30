<?php
    require_once "../php/good_card.php";
    require_once "../php/sql_connection.php";

    function draw_goods() {
        $connection = new SQLConnection();
        // $good_cards = $connection->get_all_goods();
        
        
        if (isset($_SESSION['current_filters'])) {
            $current_filters = $_SESSION['current_filters'];

            $min = $current_filters['price_from'];
            $max = $current_filters['price_to'];

            $price = "(`price` BETWEEN $min AND $max)";
            $querry = "SELECT * FROM `goods` WHERE $price;";

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
        }
    }
?>