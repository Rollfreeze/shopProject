<?php
    /// Первое добавление в корзину
    if (isset($_POST) && !isset($_SESSION['current_basket'])) {
        // $age = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
        // echo json_encode($age);

        // $_SESSION['goods_id_basket'] = array();

        $_SESSION['current_basket'] = [
            // List<int>
            'goods_id' => array(),

            // Map<int (id), int (its amount)>
            'id_its_price' => array(),

            // Map<int (id), int (its amount)>
            'id_its_amount' => array(),

            // int
            'common_sum' => 0
        ];


        // Добавили в общее количество добавленных позиций
        array_push($_SESSION['current_basket']['goods_id'], $_POST['good_id']);

        // Добавили к выбранному элементу цену за шт.
        $_SESSION['current_basket']['id_its_price'] = 
            array($_POST['good_id'] => $_POST['good_price']);

        // Добавили к выбранному элементу количество выбранных шт.
        $_SESSION['current_basket']['id_its_amount'] =
            array($_POST['good_id'] => $_POST['amount_selected_value']);

        // текущая общая сумма
        $_SESSION['current_basket']['common_sum'] = 
            $_POST['good_price'] * $_POST['amount_selected_value'];


        echo json_encode($_SESSION['current_basket']);
    
    /// Очередное добавление в корзину
    } else if (isset($_POST) && isset($_SESSION['current_basket'])) {

        // Если товара с таким id еще нет в сессии
        if (!in_array($_POST['good_id'], $_SESSION['current_basket']['goods_id'])) {
            // Добавляем id-шник в количество добавленных позиций
            array_push($_SESSION['current_basket']['goods_id'], $_POST['good_id']);

            // Добавили к выбранному элементу цену за шт.
            $_SESSION['current_basket']['id_its_amount'] = 
                $_SESSION['current_basket']['id_its_amount'] +   
                array($_POST['good_id'] => $_POST['amount_selected_value']);

            // Добавили к выбранному элементу количество выбранных шт.
            $_SESSION['current_basket']['id_its_amount'] = 
                $_SESSION['current_basket']['id_its_amount'] +   
                array($_POST['good_id'] => $_POST['amount_selected_value']);
            
            // текущая общая сумма
            $common_sum = 0;
            for ($i = 0; $i < count($_SESSION['current_basket']['goods_id']) - 1; $i++) {
                // Взял id i-го товара в корзине
                $current_id = $_SESSION['current_basket']['goods_id'][$i];
                // Определяю сколько денег за товар с этим id-шником надо отдать,
                // основываясь на количестве этого товара в корзине и цену за шт. этого товара
                $sum_per_good =
                    $_SESSION['current_basket']['id_its_price'][$current_id] *
                    $_SESSION['current_basket']['id_its_amount'][$current_id];
                
                // Добавляем в итоговую сумму
                $common_sum = $common_sum + $sum_per_good;
            }

            $_SESSION['current_basket']['common_sum'] = $common_sum;
        }

        // Значит товар уже есть, но к нему добавили количество
        else {
            // Увеличили количество выбранных шт. у выбранного элемента
            $_SESSION['current_basket']['id_its_amount'][$_POST['good_id']] = 
                $_SESSION['current_basket']['id_its_amount'][$_POST['good_id']] +
                $_POST['amount_selected_value'];
        }

        echo json_encode($_SESSION['current_basket']);
    }
?>