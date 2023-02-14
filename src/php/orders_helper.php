<?php
    function draw_ordered_item_row($good_id, $title, $currentAmount, $currentSum, $goodImage) {
        $item_row = <<< ITEM_ROW
        <div class="good-item-row">
            <div class="good-item-row-left">
                <div class="good-item-logo" style="background-image: url('../assets/$goodImage');"></div>
                <a href="good_item_page.php?get_by_id=$good_id" class="good-item-title">$title</a>
            </div>
            

            <div class="good-item-kg-amount">
                <p class="normal-bold" style="display:bloc; margin-bottom: 0px; font-size: 18px;">кг:</p>
                <div class="product-item-kg-counter">
                    <input class="goodAmountInput" type="text" value="$currentAmount"></input>
                </div>
                <div class="good-item-price">$currentSum руб.</div>
            </div>
        </div>
ITEM_ROW;
        echo $item_row;
    }

    function get_status_name($status_id) {
        switch($status_id) {
            case 1: return 'Обрабатывается';
            case 2: return 'Доставлено';
            case 3: return 'Отклонен';
        }
    }

    function get_status_color($status_id) {
        switch($status_id) {
            case 1: return 'yellow';
            case 2: return 'lightgreen';
            case 3: return 'red';
        }
    }

    function get_order_table_row($id, $customer_name,
        $customer_phone, $date, $order_price, $goods_in_order,
        $order_status_id, $address) {
        
        $status_name = get_status_name($order_status_id);
        $status_color = get_status_color($order_status_id);
        $order = <<< ORDER
        <tr>
            <td class="td-1 cntr">$id</td>
            <td class="td-2 cntr">$customer_name</td>
            <td class="td-2 cntr">$customer_phone</td>
            <td class="td-2 cntr">$address</td>
            <td class="td-2 cntr">$date</td>

            <td class="td-2 cntr">
                <form method="get" action="order_details_page.php">
                    <input type="hidden" name="order_id" value="$id">
                    <input type="hidden" name="order_price" value="$order_price">
                    <input type="hidden" name="goods_in_order" value="$goods_in_order">
                    <button type="submit" class="td-a">Посмотреть</button>
                </form>
            </td>
            <td class="td-2 cntr">$order_price руб.</td>
            <td class="td-2 cntr" style="color: $status_color">$status_name</td>
        </tr>
ORDER;
        echo $order;
    }
?>