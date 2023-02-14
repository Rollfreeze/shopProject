<?php
    session_start();
    require_once "../php/general_page.php";
    require_once "../php/sql_connection.php";
    require_once "../php/country_helper.php";
    require_once "../php/orders_helper.php";
    $isRoot = false;
    $isAuth = isset($_SESSION['current_user']) && $_SESSION['current_user'] != null;
    if ($isAuth) {
        $user = $_SESSION['current_user'];
        $isRoot = $user['is_root'];
    }
    if (!$isRoot) header('Location: http://localhost/pages/catalog.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Контроль заказов</title>
</head>
<body>
    <?php
        echo getHeader();
    ?>

    <!-- bread bar -->
    <div class="container">
        <main class="main">
           <div class="bread-bar">
                <a class="bread-bar-item" href="index.php" style="margin-left: 0px">Главная</a>
                <span class="bread-slesh">/</span>
                <a class="bread-bar-item" href="control_orders.php">Контроль заказов</a>
           </div>
        </main>
    </div>

    <div class="container">
        <div class="personal-data-law-box">
            <h1 class="h1" style="text-align: center; margin-top: 0px;">Просмотр заказов</h1>

            <?php
                $connection = new SQLConnection();
                $orders = $connection->get_all_orders();
            ?>

            <table class="orders-forms-box">
                <tbody>
                    <tr>
                        <td class="td-1">ID Заказа</td>
                        <td class="td-2 cntr">Имя заказчика</td>
                        <td class="td-2 cntr">Телефон для связи</td>
                        <td class="td-2 cntr" style="width: 250px;">Адрес доставки</td>
                        <td class="td-2 cntr">Дата заказа</td>
                        <td class="td-2 cntr">Состав</td>
                        <td class="td-2 cntr">Стоимость (руб.)</td>
                        <td class="td-2 cntr">Статус</td>
                        <td class="td-2 cntr">Действие</td>
                    </tr>
                    <?php
                        foreach($orders as $order) {
                            get_root_order_table_row(
                                $order['id'],
                                $order['customer_name'],
                                $order['customer_phone'],
                                $order['date'],
                                $order['order_price'],
                                $order['goods_in_order'],
                                $order['order_status_id'],
                                $order['address'],
                            );
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
        echo getFooter();
    ?>
</body>
</html>