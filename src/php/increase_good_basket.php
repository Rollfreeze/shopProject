<?php
    session_start();

    if (isset($_POST) && isset($_SESSION['current_basket'])) {
        $_SESSION['current_basket']['id_its_amount'][$_POST['id']]++;

        // Текущая общая сумма
        $common_sum = 0;
        for ($i = 0; $i < count($_SESSION['current_basket']['goods_id']); $i++) {
            // Взял id i-го товара в корзине
            $current_id = $_SESSION['current_basket']['goods_id'][$i];

            // Определяю сколько денег за товар с этим id-шником надо отдать,
            // основываясь на количестве этого товара в корзине и цену за шт. этого товара
            $sum_per_good =
                intval($_SESSION['current_basket']['id_its_price'][$current_id]) *
                intval($_SESSION['current_basket']['id_its_amount'][$current_id]);
            
            // Добавляем в итоговую сумму
            $common_sum = $common_sum + $sum_per_good;
        }
        $_SESSION['current_basket']['common_sum'] = $common_sum;

        // текущий общий вес
        $_SESSION['current_basket']['common_weight'] 
            = array_sum($_SESSION['current_basket']['id_its_amount']);

        echo json_encode($_SESSION['current_basket']);
    }
?>