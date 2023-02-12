<?php
    session_start();

    if (isset($_POST) && isset($_SESSION['current_basket'])) {

        $delete_id = strval($_POST['delete_id']);
        $temp = array_diff($_SESSION['current_basket']['goods_id'], ["$delete_id"]);
        $_SESSION['current_basket']['goods_id'] = array_values($temp);

        unset($_SESSION['current_basket']['id_its_amount'][intval($_POST['delete_id'])]);
        unset($_SESSION['current_basket']['id_its_price'][intval($_POST['delete_id'])]);

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
        // $_SESSION['current_basket']['common_weight']

        echo json_encode($_SESSION['current_basket']);
    }
?>